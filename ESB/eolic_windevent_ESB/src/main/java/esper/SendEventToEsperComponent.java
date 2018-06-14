package esper;

import java.util.HashMap;
import java.util.LinkedHashMap;
import java.util.Map;

import org.mule.api.annotations.param.Payload;



public class SendEventToEsperComponent {

	@SuppressWarnings("unchecked")
	public synchronized void sendEventToEsper(@Payload Map<String, Object> eventMap) { 
		/* Si queremos introducir algún intervalo de tiempo entre envío y envío podemos hacerlo */
		
		//try {Thread.sleep(1000);} catch (InterruptedException e) {e.printStackTrace();}
		//Avisamos de la entrada de eventos simples del tipo X
		System.out.println("			------> PROCESO DE ENVIADO DEL EVENTO SIMPLE A MOTOR CEP");
		String eventTypeName = (String) eventMap.keySet().toArray()[0];
		System.out.println("=== Evento tipo: " + eventTypeName);
		
		if(eventTypeName=="Ruido"){
			System.out.println("@ El evento 'Ruido' nos será enviado al motor CEP");
		}else{
			/* Obtenemos el schema del evento simple X por si todavía no se ha introducido su schema en el motor CEP*/
			
			Map<String, Object> eventPayload = new HashMap<String, Object>();
			eventPayload = (Map<String, Object>) eventMap.get(eventTypeName);
			
			Map<String, Object> eventPayloadTypeMap = new HashMap<String, Object>();
			eventPayloadTypeMap = getEventType(eventPayload);
			
			System.out.println("					===eventPayloadTypeMap: " + eventPayloadTypeMap);
			
			/*En caso de que no hayamos introducido aún lo introducimos y lo mandamos
			 * En caso contrario, simplemente lo mandamos */
			if (!EsperUtils.eventTypeExists(eventTypeName)) {
				EsperUtils.addNewEventType(eventTypeName, eventPayloadTypeMap);
				System.out.println("	***" + eventTypeName + " schema de evento simple añadido a MOTOR CEP");
			}
			System.out.println("	@Sytem: ATENCION ESTOY MANDANDO EVENTO SIMPLE: ");
			System.out.println("		- EventPayload: "+eventPayload);
			System.out.println("		- Eventype: "+eventTypeName);
			EsperUtils.sendEvent(eventPayload, eventTypeName);
			System.out.println("\n	@System: Mandado " + eventTypeName + " to Esper: " + eventPayload);
		}
		
	}

	
	private Map<String, Object> getEventType(Map<String, Object> eventMap) {
		 /* Mapeamos cada tipo de dato para enviarlo al motor CEP y así generar el schema si se necesitase */
		Map<String, Object> eventTypeMap = new LinkedHashMap<String, Object>();
		 
		for (String key : eventMap.keySet()) {
			
			Object value = eventMap.get(key);
			System.out.println(" 	Mandando: "+key+" = "+value);
             
			if (value instanceof Map) {               
				@SuppressWarnings("unchecked")
				Map<String, Object> nestedEventProperty = getEventType((Map<String, Object>) value);
				
				eventTypeMap.put(key, nestedEventProperty);
			} else {
				eventTypeMap.put(key, value.getClass());
			}
			
			}
		return eventTypeMap;

	}
}