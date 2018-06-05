package esper;

import java.util.Map;

import com.espertech.esper.client.Configuration;
import com.espertech.esper.client.EPServiceProvider;
import com.espertech.esper.client.EPServiceProviderManager;
import com.espertech.esper.client.EPStatement;
import com.espertech.esper.client.StatementAwareUpdateListener;


public class EsperUtils {
	
	private static EPServiceProvider epService;
			
	public static EPServiceProvider getService() {
		
		synchronized(EsperUtils.class) {
			
			if (epService == null) {
				
				Configuration config = new Configuration();										
				epService = EPServiceProviderManager.getDefaultProvider(config);
				System.out.println("Running Esper engine");
			
			}
		}
		
		return epService;
	}
	/* Método para ver si un schema de un evento ha sido cargado en el motor CEP*/
	public static boolean eventTypeExists(String eventTypeName) {
		return getService().getEPAdministrator().getConfiguration().isEventTypeExists(eventTypeName);
	}
	/* Pasamos el nombrey el schema del nuevo evento para incorporarlo al motor CEP */
	public static void addNewEventType(String eventTypeName, Map<String, Object> eventTypeMap) {
		getService().getEPAdministrator().getConfiguration().addEventType(eventTypeName, eventTypeMap);
	}
	/* Desplegamos el patrón contenido en el String eventPattern y lo añadimos al motor CEP*/
	public static EPStatement addNewEventPattern(String eventPattern) throws Exception {
		return getService().getEPAdministrator().createEPL(eventPattern);
	}
	/* Método para añadir el listener a cada patrón */
	public static void addListener(StatementAwareUpdateListener listener, EPStatement eventPattern) throws Exception {
		eventPattern.addListener(listener);
	}
	/* Enviar patrón a la instancia del motor CEP */
	public static void sendEvent(Map<String,Object> eventMap, String eventTypeName) {
		getService().getEPRuntime().sendEvent(eventMap, eventTypeName);
	}

}
