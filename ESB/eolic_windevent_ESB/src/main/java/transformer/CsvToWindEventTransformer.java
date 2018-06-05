package transformer;


import java.text.DecimalFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.LinkedHashMap;
import java.util.Map;

import org.codehaus.jackson.JsonNode;
import org.codehaus.jackson.map.ObjectMapper;
import org.mule.api.MuleContext;
import org.mule.api.MuleMessage;
import org.mule.api.transformer.TransformerException;
import org.mule.transformer.AbstractMessageTransformer;

import classes.Zona;

public class CsvToWindEventTransformer extends AbstractMessageTransformer{

	DecimalFormat df2 = new DecimalFormat("#,00");

	@Override
	public Object transformMessage(MuleMessage message, String outputEncoding) throws TransformerException {
		// TODO Auto-generated method stub
		//Declaración de variables para convertir el registro del fichero CSV
		Map<String, Object> eventMap = new LinkedHashMap<String, Object>();
		Map<String, Object> eventPayload = new LinkedHashMap<String, Object>();
		ObjectMapper mapper = new ObjectMapper();
		JsonNode jsonNode = null;
		
		//Obtención del String recibido, el string es un registro del archivo CSV
		//Lo transformamos en un array y los clasificamos para convertir los datos con la clave y tipo correctos.
		try {
			System.out.println(message.getPayloadAsString());
			String mensaje = message.getPayloadAsString();
			String [] registro = mensaje.split(",");
			for (int i = 0; i<registro.length ; i++){
				/*La función clasificador clasifica el cada elemento del registro según el modelo de aerogenerador obtenido
				 * Primero = index
				 * Segundo = fecha en formato dd/mm/yyyy
				 * ... */
				eventPayload = clasificador(eventPayload, registro, i);
			}
			//Añadimos una clave más con el tipo de nuestro evento simple
	        eventMap.put("WindEvent", eventPayload);
		} catch (Exception e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		/* Mostramos por consola la transformación */
		System.out.println("===    WindEvent transformado: " + eventMap);

		
		/* Obtenemos el modelo entrenado de las medias y desviaciones teóricas por bines de vientoç
		 * Para ver este modelo, queda definido de forma global en la variable "key.rules" del fichero "mule-app.properties"
		 * Recordemos que diez minutal tras diez minutal, estas propiedades cambiarán para contar el número de diezminutales
		 * en cada bin de viento. Cada zona corresponde con un bin de viento, cada zona tiene:
		 * 		Zona = Bin de viento
		 * 		MEDIA
		 * 		DESVIACION
		 * 		N = Nº de diez minutales que van a ir pasando en cada diez minutal
		 * */
		ArrayList<Zona> reglas = getListProperty(message);
		
		double viento = (double)eventPayload.get("windSpeed");
		System.out.println("intervalo "+viento);
		
		if(viento-Math.floor(viento)-0.5<0)
			viento = Math.floor(viento);
		else
			viento = Math.floor(viento)+0.5;
		/* Dada las zonas del modelo actual, cogemos aquella que le corresponda al evento simple que hemos introducido.
		 * Después la filtramos para ver si es ruido o no. Si el evento simple tiene unos datos que no le corresponden 
		 * entonces no lo mandaremos
		 *  */
		Zona miZona = getZona(reglas,viento);
		double maximo = miZona.media+(4*miZona.desv);
		double minimo = miZona.media-(4*miZona.desv);
		double potencia = (double)eventPayload.get("power");
		/* Mostramos por donde va a caer el Evento Simple nuevo y sumamos la N de esa zona*/
		System.out.println("intervalo "+viento+ " MAX/MIN ["+maximo+" "+minimo+"]");
		miZona.N++;
		if(potencia >=minimo && potencia<=maximo){
			System.out.println("MANDO "+potencia);
			
		}else{
			System.out.println("NO MANDO"+potencia);
			
			
		}
		reglas = setZona(reglas,miZona,viento);	
		/* Una vez hecho el filtrado del evento transformado, actualizamos el modelo
		 * que está en "key.rules".
		 */
		String property = resetProperty(reglas);
		System.setProperty("key.rules", property);
		System.out.println("PROPERTY// "+property);
		for(int i=0;i<reglas.size();i++){
			System.out.println(reglas.get(i));
		}
			
		
		return eventMap;
	}
	/*
	 * Este método devuelve la zona (bin de viento) correspondiente a una velocidad de viento dada.
	 *
	 * */
	private static Zona getZona(ArrayList<Zona> reglas, double velocidad){
		int indice =0;
		boolean encontrado = false;
		for(int i=0; i<reglas.size();i++)
			if(reglas.get(i).zone==velocidad){
				System.out.println("get#@#@#@#@#@#@#@#@#@#@# "+reglas.get(i) +" "+ velocidad);
				return reglas.get(i);
			}
		return null;
	}
	/*	
	 * Este método actualiza el conjunto de zonas con la nueva pasada por parámetro.
	 * */
	private static ArrayList<Zona> setZona(ArrayList<Zona> reglas,Zona miZona,double viento){
		for(int i=0; i<reglas.size();i++){
			if(reglas.get(i).zone==viento) {
				System.out.println("set#@#@#@#@"+miZona.zone+"#@#@#@#@#@#@# "+reglas.get(i) +" "+ viento);
				reglas.set(i, miZona);
				return reglas;
			}
		}
		
		return reglas;		
	}
	/*
	 * Este método prepara un string dado un conjunto de Zonas para poder después integrarlo a las properties de Mule.
	 * 
	 * */
	private static String resetProperty(ArrayList<Zona> reglas){
		String property = "";
		for(int i=0; i<reglas.size();i++){
			if(i==0){
				property = reglas.get(i).zone+","+
						reglas.get(i).media+","+
						reglas.get(i).desv+","+
						reglas.get(i).N;
			}else{
				property = property +":"+reglas.get(i).zone+","+
						reglas.get(i).media+","+
						reglas.get(i).desv+","+
						reglas.get(i).N;
				
			}
		}

		return property;
	}
	/*
	 * Este método transforma el string del modelo de las zonas (bines de viento) para obtener un 
	 * ArrayList de Zonas. De esta forma podremos eliminar el ruido de los proximos eventos simples.
	 */
	private static ArrayList<Zona> getListProperty(MuleMessage message){
		MuleContext context = message.getMuleContext();
		System.out.println(context);
		System.out.println(System.getProperty("key.rules"));
		String [] rules = System.getProperty("key.rules").split(":");
		String [] registro;
		ArrayList<Zona> reglas = new ArrayList<Zona>();
		
		for(int i = 0; i<rules.length;i++){
			registro = rules[i].split(",");
			reglas.add(new Zona(Double.parseDouble(registro[0]),
								Double.parseDouble(registro[1]),
								Double.parseDouble(registro[2]),
								Double.parseDouble(registro[3])));
			
		}
		return reglas;
	}
	/* Método para obtener una fecha en el formato especificado a través de la clase SimpleDateFormat */
	private static Date getDate(SimpleDateFormat formatter, String dateInString){
		try {

            Date date = formatter.parse(dateInString.replaceAll("Z$", "+0000"));
            return date;

        } catch (ParseException e) {
            e.printStackTrace();
            return null;
            
        }
		
	}
	/*
	 *	El método clasificador es la base de la transformación cada registro del archivo CSV, según
	 *	el dato obtenido y su posición en el registro está predistinado a tener un formato u otro. Esto
	 *	depende del modelo de aerogenerador.
	 *	- Le pasamos un HashMap correspondiente al esqueleto del EventoSimple que se va ir rellenando.
	 *	- String [] registro del CSV.
	 *	- Indice a obtener del registro CSV e introducir en el HashMap.
	 * */
	private static Map<String, Object> clasificador(Map<String, Object> event,String [] registro,int i){
		switch(i){
			case 0:
				event.put("index",Integer.parseInt(registro[i]));
				break;
			case 1:
				event.put("systemNumber", Integer.parseInt(registro[i]));
				break;
			case 2:
				String miFecha [] = registro[i].split("/");
				
				Date curDate = new Date(miFecha[0]+"/"+miFecha[1]+"/"+miFecha[2]);
				System.out.println("EL PROGRAMA ME DA UNA FECHA: "+curDate);
				SimpleDateFormat format = new SimpleDateFormat("MM/dd/yyyy");
				String fechaFormatoCorrecto = format.format(curDate);
				
				
				System.out.println("EL FORMATO FECHA SALIDA ES INI"+registro[i]);
				System.out.println("EL FORMATO FECHA SALIDA ES TRA"+curDate);
				
				event.put("fecha", fechaFormatoCorrecto);
				break;
			case 3:
				String miDate [] = registro[2].split("/");
				String miHora [] = registro[i].split(":");
				SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd'T'HH:mm:ssZ");
				String dateInString = miDate[2]+"-"+miDate[0]+"-"+miDate[1]+"T"+miHora[0]+":"+miHora[1]+":"+miHora[2]+"Z";
				Date laFecha = getDate(formatter,dateInString);
				event.put("time", laFecha);
				break;
			case 4:
				event.put("TimeOffset", Integer.parseInt(registro[i]));
				break;
			case 5:
				event.put("power", Double.parseDouble(registro[i]));
				break;
			case 6:
				event.put("towerDeflection", Double.parseDouble(registro[i]));
				break;
			case 7:
				event.put("powerFactor", Double.parseDouble(registro[i]));
				break;
			case 8:
				event.put("reactivePower", Double.parseDouble(registro[i]));
				break;
			case 9:
				event.put("voltageL1_N", Double.parseDouble(registro[i]));
				break;
			case 10:
				event.put("voltageL2_N", Double.parseDouble(registro[i]));
				break;
			case 11:
				event.put("voltageL3_N", Double.parseDouble(registro[i]));
				break;
			case 12:
				event.put("currentL1", Double.parseDouble(registro[i]));
				break;
			case 13:
				event.put("currentL2", Double.parseDouble(registro[i]));
				break;
			case 14:
				event.put("currentL3", Double.parseDouble(registro[i]));
				break;
			case 15:
				event.put("generatorSpeedCCU", Double.parseDouble(registro[i]));
				break;
			case 16:
				event.put("rotorSpeedPLC", Double.parseDouble(registro[i]));
				break;
			case 17:
				event.put("blade1ActualDegree", Double.parseDouble(registro[i]));
				break;					    			
			case 18:
				event.put("windSpeed", Double.parseDouble(registro[i]));
				break;
			case 19:
				event.put("nacellePosition", Double.parseDouble(registro[i]));
				break;
			case 20:
				event.put("nacelleRevolution", Double.parseDouble(registro[i]));
				break;
			case 21:
				event.put("generatorSpeedPLC", Double.parseDouble(registro[i]));
				break;
			case 22:
				event.put("windDeviationOneSec", Double.parseDouble(registro[i]));
				break;
			case 23:
				event.put("blade2ActualDegree", Double.parseDouble(registro[i]));
				break;
			case 24:
				event.put("blade3ActualDegree", Double.parseDouble(registro[i]));
				break;
			case 25:
				event.put("blade1SetDegree", Double.parseDouble(registro[i]));
				break;
			case 26:
				event.put("blade2SetDegree", Double.parseDouble(registro[i]));
				break;
			case 27:
				event.put("blade3SetDegree", Double.parseDouble(registro[i]));
				break;
			case 28:
				event.put("powerFactorSet", Double.parseDouble(registro[i]));
				break;
			case 29:
				event.put("nSet1", Double.parseDouble(registro[i]));
				break;
			case 30:
				event.put("nSet2", Double.parseDouble(registro[i]));
				break;
			case 31:
				event.put("tOrqueActual", Double.parseDouble(registro[i]));
				break;
			case 32:
				event.put("tOrqueSet", Double.parseDouble(registro[i]));
				break;
			case 33:
				event.put("operatingState", Double.parseDouble(registro[i]));
				break;
			case 34:
				event.put("nacellePicture", Double.parseDouble(registro[i]));
				break;
			case 35:
				event.put("windDeviation10", Double.parseDouble(registro[i]));
				break;
			case 36:
				event.put("tempGen1", Double.parseDouble(registro[i]));
				break;
			case 37:
				event.put("tempGen2", Double.parseDouble(registro[i]));
				break;
			case 38:
				event.put("tempBearingA", Double.parseDouble(registro[i]));
				break;
			case 39:
				event.put("tempBearingB", Double.parseDouble(registro[i]));
				break;
			case 40:
				event.put("teamGearbox", Double.parseDouble(registro[i]));
				break;
			case 41:
				event.put("tempAir", Double.parseDouble(registro[i]));
			case 42:
				event.put("tempNacelle", Double.parseDouble(registro[i]));
			case 43:
				event.put("tempGenCoolingAir", Double.parseDouble(registro[i]));
				break;
			case 44:
				event.put("tempGearboxBearing", Double.parseDouble(registro[i]));
				break;
			case 45:
				event.put("tempShaftBearing", Double.parseDouble(registro[i]));
				break;
			case 46:
				event.put("tempShaftBearing", Double.parseDouble(registro[i]));
				break;
			case 47:
				event.put("highSpeedRunningNumber", Double.parseDouble(registro[i]));
				break;
			case 48:
				event.put("lineFrequency", Double.parseDouble(registro[i]));
				break;
			case 49:
				event.put("reserve2", Double.parseDouble(registro[i]));
				break;
			case 50:
				event.put("circuitBreakerCutIns", Double.parseDouble(registro[i]));
				break;
			case 51:
				event.put("towerAceleration", Double.parseDouble(registro[i]));
				break;
			case 52:
				event.put("driveTrainAcceleration", Double.parseDouble(registro[i]));
				break;
			case 53:
				event.put("tempGearboxBearingB", Double.parseDouble(registro[i]));
				break;
			case 54:
				event.put("reserve12", Double.parseDouble(registro[i]));
				break;
			case 55:
				event.put("reserve13", Double.parseDouble(registro[i]));
				break;
			case 56:
				event.put("reserve14", Double.parseDouble(registro[i]));
				break;
			case 57:
				event.put("tTowerBase1", Double.parseDouble(registro[i]));
				break;
			case 58:
				event.put("tTowerBase2", Double.parseDouble(registro[i]));
				break;
			case 59:
				event.put("tempExternalOilHeater", Double.parseDouble(registro[i]));
				break;
			case 60:
				event.put("vacummExternalOilHeater", Double.parseDouble(registro[i]));
				break;
			case 61:
				event.put("hydraulicPrepressure", Double.parseDouble(registro[i]));
				break;
			case 62:
				event.put("scopeCH1", Double.parseDouble(registro[i]));
				break;
			case 63:
				event.put("scopeCH2", Double.parseDouble(registro[i]));
				break;
			case 64:	
				event.put("scopeCH3", Double.parseDouble(registro[i]));
				break;
			case 65:	
				event.put("scopeCH4", Double.parseDouble(registro[i]));
				break;
			case 66:	
				event.put("DI1Main", Double.parseDouble(registro[i]));
				break;
			case 67:	
				event.put("reserve8", Double.parseDouble(registro[i]));
				break;
			case 68:	
				event.put("DI1Top", Double.parseDouble(registro[i]));
				break;
			case 69:	
				event.put("DI2Top", Double.parseDouble(registro[i]));
				break;
			case 70:	
				event.put("reserve9", Double.parseDouble(registro[i]));
				break;
			case 71:
				event.put("CANIO", Double.parseDouble(registro[i]));
				break;				    			
			case 72:	
				event.put("DO1Main", Double.parseDouble(registro[i]));
				break;
			case 73:	
				event.put("reserve10", Double.parseDouble(registro[i]));
				break;
			case 74:	
				event.put("DO1Top", Double.parseDouble(registro[i]));
				break;
			case 75:	
				event.put("reserve11", Double.parseDouble(registro[i]));
				break;
				
			
		
		}
		
		
		
		return event;
	}

}
