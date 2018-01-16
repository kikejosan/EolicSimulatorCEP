package Clasificator;
import java.util.Date;
import java.io.Closeable;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Iterator;
import org.apache.poi.ss.usermodel.Cell;
import org.apache.poi.ss.usermodel.DateUtil;
import org.apache.poi.ss.usermodel.Row;
import org.apache.poi.xssf.usermodel.XSSFSheet;
import org.apache.poi.xssf.usermodel.XSSFWorkbook;


public class EventoInfo {
	int index;
	int systemNumber;
	Date date;
	Date time;
	int timeOffset;
	int count;
	double power;
	double towerDeflection;
	double powerFactor;
	double reactivePower;
	double voltageL1_N;
	double voltageL2_N;
	double voltageL3_N;
	double currentL1;
	double currentL2;
	double currentL3;
	double generatorSpeedCCU;
	double rotorSpeedPLC;
	double blade1ActualDegree;
	double windSpeed;
	double nacellePosition;
	double nacelleRevolution;
	double generatorSpeedPLC;
	double windDeviationOneSec;
	double blade2ActualDegree;
	double blade3ActualDegree;
	double blade1SetDegree;
	double blade2SetDegree;
	double blade3SetDegree;
	double powerFactorSet;
	double nSet1;
	double nSet2;
	double tOrqueActual;
	double tOrqueSet;
	double operatingState;
	double nacellePicture;
	double windDeviation10;
	double tempGen1;
	double tempGen2;
	double tempBearingA;
	double tempBearingB;
	double teamGearbox;
	double tempAir;
	double tempNacelle;
	double tempGenCoolingAir;
	double tempGearboxBearing;
	double tempShaftBearing;
	double highSpeedRunningNumber;
	double lineFrequency;
	double reserve2;
	double circuitBreakerCutIns;
	double towerAceleration;
	double driveTrainAcceleration;
	double tempGearboxBearingB;
	double reserve12;
	double reserve13;
	double reserve14;
	double tTowerBase1;
	double tTowerBase2;
	double tempExternalOilHeater;
	double vacummExternalOilHeater;
	double hydraulicPrepressure;
	double scopeCH1;
	double scopeCH2;
	double scopeCH3;
	double scopeCH4;
	double DI1Main;
	double reserve8;
	double DI1Top;
	double DI2Top;
	double reserve9;
	double CANIO;
	double DO1Main;
	double reserve10;
	double DO1Top;
	double reserve11;
	ArrayList mySelf;
	
	public EventoInfo() {
		this.mySelf = new ArrayList();
		
		
	}
	
	public ArrayList<EventoInfo> getEventosArfe(String filename) throws IOException{
		ArrayList aux = new ArrayList();
		
		
		
		
		FileInputStream file = new FileInputStream(new File(filename));
		// Crear el objeto que tendra el libro de Excel
		XSSFWorkbook workbook = new XSSFWorkbook(file);
		/*
		 * Obtenemos la primera pestaña a la que se quiera procesar indicando el indice.
		 * Una vez obtenida la hoja excel con las filas que se quieren leer obtenemos el iterator
		 * que nos permite recorrer cada una de las filas que contiene.
		 */
		XSSFSheet sheet = workbook.getSheetAt(0);
		Iterator<Row> rowIterator = sheet.iterator();
		Row row;
		ArrayList<EventoInfo> eventos = new ArrayList<EventoInfo>();
		EventoInfo evento;
		
		int contador = 0;
		// Recorremos todas las filas para mostrar el contenido de cada celda
		while (rowIterator.hasNext()) {
			evento = new EventoInfo();
			row = rowIterator.next();
		    // Obtenemos el iterator que permite recorres todas las celdas de una fila
		    Iterator<Cell> cellIterator = row.cellIterator();
		    Cell celda;
		    
		    while (cellIterator.hasNext()){
				celda = cellIterator.next();
				switch(celda.getColumnIndex()) {
					case 0:
						//evento.index = celda.getNumericCellValue();	
						break;
				}
				// Dependiendo del formato de la celda el valor se debe mostrar como String, Fecha, boolean, entero...
				switch(celda.getCellType()) {
					case Cell.CELL_TYPE_NUMERIC:
					    if( DateUtil.isCellDateFormatted(celda) ){
					    	if(celda.getColumnIndex()==2){
								evento.date = celda.getDateCellValue();
								
							}else {
								evento.time = celda.getDateCellValue();
							}
					    	evento.mySelf.add(celda.getDateCellValue());
					    }else{
					    	//Se que es un dato numerico entonces ahora lo paso a mi objeto	
					    	// es un switch muy largo y enguarra el codigo
					    	evento = putAttNumericDataEvent(evento, celda);
					    	evento.mySelf.add(celda.getNumericCellValue());

					    	System.out.print(celda.getColumnIndex()+" "+celda.getNumericCellValue()+" | ");
					    }
					    
					    break;
					case Cell.CELL_TYPE_STRING:
					    System.out.print(/*celda.getColumnIndex()+" "+celda.getStringCellValue()+*/"CHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACHOOOOOOOOOOOOOOOOOOOOOOOOOOOOO | ");
					    break;
					case Cell.CELL_TYPE_BOOLEAN:
						
					    System.out.print(celda.getColumnIndex()+" "+celda.getBooleanCellValue()+" | ");
					    break;
				}
		    }
		    eventos.add(evento);
		    System.out.println("ESTAMOS AQUIIIIIIIIIIIIII");
		    System.out.println("hello"+evento.getMySelf());
		    
		}
		return eventos;
	}
	public double getIndex() {
		return this.index;
	}
	public int getSystemNumber() {
		return this.systemNumber;
	}
	public Date getDate() {
		return this.date;
	}
	public Date getTime() {
		return this.time;
	}
	public int getTimeOffset() {
		return this.timeOffset;
	}
	public int getCount() {
		return this.count;
	}
	public double getPower() {
		return this.power;
	}
	public double getTowerDeflection() {
		return this.towerDeflection;
	}
	
	public ArrayList getMySelf() {
		return this.mySelf;
	}
	
	
	
	
	public EventoInfo putAttNumericDataEvent(EventoInfo evento, Cell celda) {
		switch(celda.getColumnIndex()) {
			case 0:
				evento.index = (int)celda.getNumericCellValue();
				break;
			case 1:
				evento.systemNumber = (int)celda.getNumericCellValue();
				break;
			case 4:
				evento.timeOffset = (int)celda.getNumericCellValue();
				break;
			case 5:
				evento.count = (int)celda.getNumericCellValue();
				break;
			case 6:
				evento.power = celda.getNumericCellValue();
				break;
			case 7:
				evento.towerDeflection = celda.getNumericCellValue();
				break;
			case 8:
				evento.powerFactor = celda.getNumericCellValue();
				break;
			case 9:
				evento.reactivePower = celda.getNumericCellValue();
				break;
			case 10:
				evento.voltageL1_N = celda.getNumericCellValue();
				break;
			case 11:
				evento.voltageL2_N = celda.getNumericCellValue();
				break;
			case 12:
				evento.voltageL3_N= celda.getNumericCellValue();
				break;
			case 13:
				evento.currentL1= celda.getNumericCellValue();
				break;
			case 14:
				evento.currentL2= celda.getNumericCellValue();
				break;
			case 15:
				evento.currentL3= celda.getNumericCellValue();
				break;
			case 16:
				evento.generatorSpeedCCU= celda.getNumericCellValue();
				break;
			case 17:
				evento.rotorSpeedPLC= celda.getNumericCellValue();
				break;
			case 18:
				evento.blade1ActualDegree= celda.getNumericCellValue();
				break;					    			
			case 19:
				evento.windSpeed= celda.getNumericCellValue();
				break;
			case 20:
				evento.nacellePosition= celda.getNumericCellValue();
				break;
			case 21:
				evento.nacelleRevolution= celda.getNumericCellValue();
				break;
			case 22:
				evento.generatorSpeedPLC= celda.getNumericCellValue();
				break;
			case 23:
				evento.windDeviationOneSec= celda.getNumericCellValue();
				break;
			case 24:
				evento.blade2ActualDegree= celda.getNumericCellValue();
				break;
			case 25:
				evento.blade3ActualDegree= celda.getNumericCellValue();
				break;
			case 26:
				evento.blade1SetDegree= celda.getNumericCellValue();
				break;
			case 27:
				evento.blade2SetDegree= celda.getNumericCellValue();
				break;
			case 28:
				evento.blade3SetDegree= celda.getNumericCellValue();
				break;
			case 29:
				evento.powerFactorSet= celda.getNumericCellValue();
				break;
			case 30:
				evento.nSet1= celda.getNumericCellValue();
				break;
			case 31:
				evento.nSet2= celda.getNumericCellValue();
				break;
			case 32:
				evento.tOrqueActual= celda.getNumericCellValue();
				break;
			case 33:
				evento.tOrqueSet= celda.getNumericCellValue();
				break;
			case 34:
				evento.operatingState= celda.getNumericCellValue();
				break;
			case 35:
				evento.nacellePicture= celda.getNumericCellValue();
				break;
			case 36:
				evento.windDeviation10= celda.getNumericCellValue();
				break;
			case 37:
				evento.tempGen1= celda.getNumericCellValue();
				break;
			case 38:
				evento.tempGen2= celda.getNumericCellValue();
				break;
			case 39:
				evento.tempBearingA= celda.getNumericCellValue();
				break;
			case 40:
				evento.tempBearingB= celda.getNumericCellValue();
				break;
			case 41:
				evento.teamGearbox= celda.getNumericCellValue();
				break;
			case 42:
				evento.tempAir = celda.getNumericCellValue();
			case 43:
				evento.tempNacelle = celda.getNumericCellValue();
			case 44:
				evento.tempGenCoolingAir= celda.getNumericCellValue();
				break;
			case 45:
				evento.tempGearboxBearing= celda.getNumericCellValue();
				break;
			case 46:
				evento.tempShaftBearing = celda.getNumericCellValue();
				break;
			case 47:
				evento.tempShaftBearing= celda.getNumericCellValue();
				break;
			case 48:
				evento.highSpeedRunningNumber= celda.getNumericCellValue();
				break;
			case 49:
				evento.lineFrequency= celda.getNumericCellValue();
				break;
			case 50:
				evento.reserve2= celda.getNumericCellValue();
				break;
			case 51:
				evento.circuitBreakerCutIns= celda.getNumericCellValue();
				break;
			case 52:
				evento.towerAceleration= celda.getNumericCellValue();
				break;
			case 53:
				evento.driveTrainAcceleration= celda.getNumericCellValue();
				break;
			case 54:
				evento.tempGearboxBearingB= celda.getNumericCellValue();
				break;
			case 55:
				evento.reserve12= celda.getNumericCellValue();
				break;
			case 56:
				evento.reserve13= celda.getNumericCellValue();
				break;
			case 57:
				evento.reserve14= celda.getNumericCellValue();
				break;
			case 58:
				evento.tTowerBase1= celda.getNumericCellValue();
				break;
			case 59:
				evento.tTowerBase2= celda.getNumericCellValue();
				break;
			case 60:
				evento.tempExternalOilHeater= celda.getNumericCellValue();
				break;
			case 61:
				evento.vacummExternalOilHeater= celda.getNumericCellValue();
				break;
			case 62:
				evento.hydraulicPrepressure= celda.getNumericCellValue();
				break;
			case 63:
				evento.scopeCH1= celda.getNumericCellValue();
				break;
			case 64:
				evento.scopeCH2= celda.getNumericCellValue();
				break;
			case 65:	
				evento.scopeCH3= celda.getNumericCellValue();
				break;
			case 66:	
				evento.scopeCH4= celda.getNumericCellValue();
				break;
			case 67:	
				evento.DI1Main= celda.getNumericCellValue();
				break;
			case 68:	
				evento.reserve8= celda.getNumericCellValue();
				break;
			case 69:	
				evento.DI1Top= celda.getNumericCellValue();
				break;
			case 70:	
				evento.DI2Top= celda.getNumericCellValue();
				break;
			case 71:	
				evento.reserve9= celda.getNumericCellValue();
				break;
			case 72:
				evento.CANIO=celda.getNumericCellValue();
				break;				    			
			case 73:	
				evento.DO1Main= celda.getNumericCellValue();
				break;
			case 74:	
				evento.reserve10= celda.getNumericCellValue();
				break;
			case 75:	
				evento.DO1Top= celda.getNumericCellValue();
				break;
			case 76:	
				evento.reserve11= celda.getNumericCellValue();
				break;
			default:
				System.out.println("\\033[31mERROR: Switch Numeric Transformer");
				break;
		
		}
		return evento;
	}
	/*public String toString() {
	
	return  index+" "+
			systemNumber+" "+
			date+" "+
			time+" "+
			timeOffset+" "+
			count+" "+
			power+" "+
			towerDeflection+" "+
			powerFactor+" "+
			reactivePower+" "+
			voltageL1_N+" "+
			voltageL2_N+" "+
			voltageL3_N+" "+
			currentL1+" "+
			currentL2+" "+
			currentL3+" "+
			generatorSpeedCCU+" "+
			rotorSpeedPLC+" "+
			blade1ActualDegree+" "+
			windSpeed+" "+
			nacellePosition+" "+
			nacelleRevolution+" "+
			generatorSpeedPLC+" "+
			windDeviationOneSec+" "+
			blade2ActualDegree+" "+
			blade3ActualDegree+" "+
			blade1SetDegree+" "+
			blade2SetDegree+" "+
			blade3SetDegree+" "+
			powerFactorSet+" "+
			nSet1+" "+
			nSet2+" "+
			tOrqueActual+" "+
			tOrqueSet+" "+
			operatingState+" "+
			nacellePicture+" "+
			windDeviation10+" "+
			tempGen1+" "+
			tempGen2+" "+
			tempBearingA+" "+
			tempBearingB+" "+
			teamGearbox+" "+
			tempAir+" "+
			tempNacelle+" "+
			tempGenCoolingAir+" "+
			tempGearboxBearing+" "+
			   	tempShaftBearing+" "+
			highSpeedRunningNumber+" "+
			lineFrequency+" "+
			reserve2+" "+
			circuitBreakerCutIns+" "+
			towerAceleration+" "+
			driveTrainAcceleration+" "+
			tempGearboxBearingB+" "+
			reserve12+" "+
			reserve13+" "+
			reserve14+" "+
			tTowerBase1+" "+
			tTowerBase2+" "+
			tempExternalOilHeater+" "+
			vacummExternalOilHeater+" "+
			hydraulicPrepressure+" "+
			scopeCH1+" "+
			scopeCH2+" "+
			scopeCH3+" "+
			scopeCH4+" "+
			DI1Main+" "+
			reserve8+" "+
			DI1Top+" "+
			DI2Top+" "+
			reserve9+" "+
			CANIO+" "+
			DO1Main+" "+
			reserve10+" "+
			DO1Top+" "+
			reserve11;
	
	}*/
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
