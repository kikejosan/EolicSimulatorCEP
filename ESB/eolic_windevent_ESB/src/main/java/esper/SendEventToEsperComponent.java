package esper;

import java.util.HashMap;
import java.util.LinkedHashMap;
import java.util.Map;

import org.mule.api.annotations.param.Payload;


/**
 * @author Juan Boubeta-Puig <juan.boubeta@uca.es>
 *
 */
public class SendEventToEsperComponent {

	@SuppressWarnings("unchecked")
	public synchronized void sendEventToEsper(@Payload Map<String, Object> eventMap) { 
		try {Thread.sleep(500);} catch (InterruptedException e) {e.printStackTrace();}
		System.out.println("			------> ENVIANDO EVENT TO ESPER");
		String eventTypeName = (String) eventMap.keySet().toArray()[0];
		System.out.println("===eventTypeName: " + eventTypeName);
		
		Map<String, Object> eventPayload = new HashMap<String, Object>();
		eventPayload = (Map<String, Object>) eventMap.get(eventTypeName);
		
		Map<String, Object> eventPayloadTypeMap = new HashMap<String, Object>();
		eventPayloadTypeMap = getEventType(eventPayload);
		
		
		System.out.println("					===eventPayloadTypeMap: " + eventPayloadTypeMap);
		/* VALE YA HE CREADO EL EVENTO PARA MANDARLO AL MOTOR*/
		System.out.println("	@@System: MANDANDO EL TIPO DE EVENTO AL MOTOR ESPER");
		if (!EsperUtils.eventTypeExists(eventTypeName)) {
			EsperUtils.addNewEventType(eventTypeName, eventPayloadTypeMap);
			System.out.println("	***" + eventTypeName + " event type added to Esper engine");
		}
		System.out.println("	@Sytem: ATENCION ESTOY MANDANDO: ");
		System.out.println("		- EventPayload: "+eventPayload);
		System.out.println("		- Eventype: "+eventTypeName);
		EsperUtils.sendEvent(eventPayload, eventTypeName);
		System.out.println("\n	@System: Mandado " + eventTypeName + " to Esper: " + eventPayload);
	}

	
	private Map<String, Object> getEventType(Map<String, Object> eventMap) {
		   
		// LinkedHashMap will iterate in the order in which the entries were put into the map
		Map<String, Object> eventTypeMap = new LinkedHashMap<String, Object>();
		 
		for (String key : eventMap.keySet()) {
			
			Object value = eventMap.get(key);
			System.out.println(" 	Sending: "+key+" = "+value);
              
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