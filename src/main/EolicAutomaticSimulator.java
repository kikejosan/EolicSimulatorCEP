package main;

import java.io.IOException;
import java.text.DecimalFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.Timer;
import java.util.TimerTask;

import Clasificator.EventoInfo;

/**
 * @author Daniel Payán Alcedo & Juan Boubeta-Puig (University of Cádiz)
 * @version 1.0 November, 14th 2015
 */
public class EolicAutomaticSimulator{
	
	// Home Automation Simulator
	
	private final static String THINGSPEAK_API_KEY_67049 = "MH1GLKUCCV64JERX"; //ATTENTION : PUT your API_KEY
	private final static int CHANNEL_ID_67049 = 67049;
	//private final static String THINGSPEAK_API_KEY_67049 = "IBC9YYP2IULVOXEK"; //ATTENTION : PUT your API_KEY
	//private final static int CHANNEL_ID_67049 = 401291;
	private final static String THINGSPEAK_API_KEY_67064 = "K16HGEI6GQ8QWLKJ"; //ATTENTION : PUT your API_KEY
	private final static int CHANNEL_ID_67064 = 67064;
	private final static String THINGSPEAK_API_KEY_67065 = "4JQP30VVFDE1L951"; //ATTENTION : PUT your API_KEY
	private final static int CHANNEL_ID_67065 = 67065;
	private final static String THINGSPEAK_API_KEY_67074 = "WXHPDDWHMBL384RM"; //ATTENTION : PUT your API_KEY
	private final static int CHANNEL_ID_67074 = 67074;

	private final static String THINGSPEAK_API_KEY_401291 = "IBC9YYP2IULVOXEK"; //ATTENTION : PUT your API_KEY
	private final static int CHANNEL_ID_401291 = 401291;
	
    private static SimulatorChannel thingSpeak_67049;
    private static SimulatorChannel thingSpeak_67064;
    private static SimulatorChannel thingSpeak_67065;
    private static SimulatorChannel thingSpeak_67074;

    
    private static SimulatorChannel thingSpeak_401291;

    //Frequency updating time
    private static int time = 20000;
    
    private static double energyconsumption = 0.0; //Field 1 in thingspeak
    private static double humidity = 0.0; //Field 2 in thingspeak
    private static double temperature = 0.0; //Field 3 in thingspeak
    private static double tvconsumption = 0.0; //Field 4 in thingspeak
    
    //Formater to values
    static DecimalFormat df2 = new DecimalFormat("#,##");
    
    private static double maxHumidity = 100.0;
    private static double minHumidity = 0.0;
    private static double maxTemperature = 70.0;
    private static double minTemperature = 0.0;
    private static double maxTvConsumption = 250.0;
    private static double minTvConsumption = 0.0;
    private static double maxEnergyConsumption = 4650.0;
    private static double minEnergyConsumption = 0.0;
    static int contador = 1; 
    
    private static double numero1 = 1.0;
    private static double numero2 = 2.0;
    private static double numero3 = 3.0;
    private static double numero4 = 4.0;
    private static double numero5 = 5.0;
    private static double numero6 = 6.0;
    private static double numero7 = 7.0;
    //private static ArrayList<Double> coleccion = new ArrayList<Double>();
    private static double numero8 = 8.0;
	private static ArrayList<EventoInfo> eventos = new ArrayList<EventoInfo>();

    
    private static String cadena = "HOLA ESB COMO ESTAS";
    
    private static double random(double min, double max)
    {
       double range = Math.abs(max - min);     
       return (Math.random() * range) + (min <= max ? min : max);
    }
    
    public static void main (String [] args){     
    	/*
    	thingSpeak_67049 = new SimulatorChannel(THINGSPEAK_API_KEY_67049, CHANNEL_ID_67049);
    	generateData(thingSpeak_67049,0);
    	thingSpeak_67064 = new SimulatorChannel(THINGSPEAK_API_KEY_67064, CHANNEL_ID_67064);
    	generateData(thingSpeak_67064,2000);
    	thingSpeak_67065 = new SimulatorChannel(THINGSPEAK_API_KEY_67065, CHANNEL_ID_67065);
    	generateData(thingSpeak_67065,4000);
    	thingSpeak_67074 = new SimulatorChannel(THINGSPEAK_API_KEY_67074, CHANNEL_ID_67074);
    	generateData(thingSpeak_67074,6000);
    	*/
    	EventoInfo evento = new EventoInfo();
    	try {
    		System.out.println("COMENCEMOS A PROCESAR EL EXCELL");
			eventos = evento.getEventosArfe("C:\\Users\\Kike Brazález\\eclipse-workspace\\HomeAutomationSimulator\\docs\\datos_aerogenerador.xlsx");
			
			
			
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
    	System.out.println(eventos);
    	for(EventoInfo eve : eventos) {
    		System.out.println(eve.getMySelf());
    	}
    	
    	thingSpeak_401291 = new SimulatorChannel(THINGSPEAK_API_KEY_401291, CHANNEL_ID_401291);
    	generateDataV2(thingSpeak_401291,0);
    	

    }
    
    
    /*
     * thingspeak : channel
     * delay : time for waiting in milliseconds next start of execution
     */
    private static void generateData(final SimulatorChannel thingspeak, int delay){
			
	        TimerTask timerTask = new TimerTask(){ 
	            @Override
	            //Code will be repeated:
	            public void run()
	            {  
	            	
	            	//generation of energyconsumption value and format the value with 2 decimals
	            	energyconsumption = random(minEnergyConsumption, maxEnergyConsumption);
	            	energyconsumption = Math.round(energyconsumption * 100.0) / 100.0;
	            	//generation of temperature value and format the value with 2 decimals
	            	temperature = random(minTemperature, maxTemperature);
	            	temperature = Math.round(temperature * 100.0) / 100.0;
	            	//generation of humidity value and format the value with 2 decimals
	            	humidity = random(minHumidity, maxHumidity);
	            	humidity = Math.round(humidity * 100.0) / 100.0;
	            	//generation of tvconsumption value and format the value with 2 decimals
	            	tvconsumption = random(minTvConsumption, maxTvConsumption);
	            	tvconsumption = Math.round(tvconsumption * 100.0) / 100.0;
            	
	            	System.out.println("\n*Generating random data from channel "  + thingspeak.getChannelName() +" \n");
	            	//We will establish a value for each ThingSpeak channel field

	            	thingspeak.setDataField(1,energyconsumption);
	            	System.out.println("Random value of Field 1, Energy Consumption : " + energyconsumption);
	            	
	            	thingspeak.setDataField(2, temperature);
	            	System.out.println("Random value of Field 2, Temperature : " + temperature);
	            		            	
	            	thingspeak.setDataField(3, humidity);
	            	System.out.println("Random value of Field 3, Humidity : " + humidity);
	            	
	            	thingspeak.setDataField(4, tvconsumption);
	            	System.out.println("Random value of Field 4, Tv Consumption : " + tvconsumption);
	            		            	
	            	
	            	
	                System.out.println("\n*Remember, system will generate data every "  + time/1000 + " seconds\n");	            	
	            	thingspeak.sendData();	                

	                System.out.println("\n");
	            }
	        }; 

	        Timer timer = new Timer(); 
	       
	        // Every time variable the value generation function is run and the generated values are sent to the channel
	        timer.scheduleAtFixedRate(timerTask, delay, time);
	}
    private static void generateDataV2(final SimulatorChannel thingspeak, int delay){
    	
        TimerTask timerTask = new TimerTask(){ 
            @Override
            //Code will be repeated:
            public void run()
            {  
            	String hola ="";
            	//We will establish a value for each ThingSpeak channel field
            	System.out.println("\n*Generating random data from channel '"  + thingspeak.getChannelName() +"' \n");
            	System.out.println("holaaaaholiata"+eventos.get(contador).getMySelf().toString());
            	thingspeak.setDataField(1,eventos.get(contador).getMySelf().get(0));
            	thingspeak.setDataField(2,eventos.get(contador).getMySelf().get(1));            	
            	thingspeak.setDataField(3,eventos.get(contador).getMySelf().get(2));
            	thingspeak.setDataField(4,eventos.get(contador).getMySelf().get(3));
            	thingspeak.setDataField(5,eventos.get(contador).getMySelf().get(4));
            	thingspeak.setDataField(6,eventos.get(contador).getMySelf().get(5));
            	thingspeak.setDataField(7,eventos.get(contador).getMySelf().get(6));            	
            	thingspeak.setDataField(8,eventos.get(contador).getMySelf().get(7));
            	
            	
            	  	
            	
            	
            	System.out.println("Mandado numero1 "+eventos.get(contador).getMySelf().get(0));
            	System.out.println("Mandado numero2 "+eventos.get(contador).getMySelf().get(1));
            	System.out.println("Mandado numero3 "+eventos.get(contador).getMySelf().get(2));
            	System.out.println("Mandado numero4 "+eventos.get(contador).getMySelf().get(3));
            	System.out.println("Mandado numero5 "+eventos.get(contador).getMySelf().get(4));
            	System.out.println("Mandado numero6 "+eventos.get(contador).getMySelf().get(5));
            	System.out.println("Mandado numero7 "+eventos.get(contador).getMySelf().get(6));
            	System.out.println("Mandado numero8 "+eventos.get(contador).getMySelf().get(7));
            	System.out.println("Mandado numero9 "+"SOY EL CRACK Y ES UN ATRIBUTO EXTRA");
            	
            	
            	System.out.println("\n*Remember, system will generate data every "  + time/1000 + " seconds\n");	            	
            	thingspeak.sendData();	                

                System.out.println("\n");
                contador++;
            	
            }
        }; 

        Timer timer = new Timer(); 
       
        // Every time variable the value generation function is run and the generated values are sent to the channel
        timer.scheduleAtFixedRate(timerTask, delay, time);
    }
}
