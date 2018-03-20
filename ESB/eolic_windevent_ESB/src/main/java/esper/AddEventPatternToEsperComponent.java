package esper;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.LinkedHashMap;
import java.util.Map;

import org.mule.DefaultMuleMessage;
import org.mule.api.MuleEventContext;
import org.mule.api.MuleException;
import org.mule.api.MuleMessage;
import org.mule.api.lifecycle.Callable;
import org.mule.api.transport.PropertyScope;

import com.espertech.esper.client.EPStatement;
import com.espertech.esper.client.EventBean;
import com.espertech.esper.client.StatementAwareUpdateListener;
import com.espertech.esper.client.EPServiceProvider;


/**
 * @author Juan Boubeta-Puig <juan.boubeta@uca.es>
 *
 */
public class AddEventPatternToEsperComponent implements Callable { 
	
	@Override
	public Object onCall(final MuleEventContext eventContext) throws Exception {
		
		final Object payload = eventContext.getMessage().getPayload();		
		final EPStatement pattern = EsperUtils.addNewEventPattern(payload.toString());
						
		StatementAwareUpdateListener genericListener = new StatementAwareUpdateListener() {
			
			@Override
			public void update(EventBean[] newComplexEvents, EventBean[] oldComplexEvents, 
					EPStatement detectedEventPattern, EPServiceProvider serviceProvider) {
				System.out.println();
				System.out.println();
				System.out.println();
				System.out.println();
				System.out.println();
				System.out.println();
				System.out.println();
				System.out.println();
				System.out.println("	ATENCION!: HE DETECTADO UN EVENTO COMPLEJO ESTOY MANDANDO UN AVISO A TU CORREO");
				if (newComplexEvents != null) {	
					
					try {
						
						// newComplexEvents[0].getUnderlying() is the payload of the complex event detected by this listener.
						System.out.println("		=====complex event payload:" + newComplexEvents[0].getUnderlying());
						
						// detectedEventPattern.getEventType().getName() specifies the event pattern that has created this complex event.
						String eventPatternName = detectedEventPattern.getEventType().getName();
						System.out.println("		=====eventPatternName: " + eventPatternName);
						
						// Create the detected complex event as a Java map (eventPatternName, event properties)
						
						Map<String, Object> complexEvent = new LinkedHashMap<String, Object>();
					
						System.out.println("		===== Estamos leyendo LA COLA DE EVENTOS COMPLEJOS");
						for(int i=0; i<newComplexEvents.length;i++){
							System.out.println("		===== "+newComplexEvents[i].getUnderlying());
						}
						
						/*
						ArrayList<Map<String, Object>> todos = new ArrayList<Map<String, Object>>();
						for(int i=0; i<newComplexEvents.length;i++){
							Map<String, Object> auxComplexEvent = new LinkedHashMap<String, Object>();
							auxComplexEvent.put(eventPatternName,newComplexEvents[i].getUnderlying());
							todos.add(auxComplexEvent);
						}
						MuleMessage auxMessage = new DefaultMuleMessage(todos,eventContext.getMuleContext());
						Map<String, Object> auxMessageProperties = new HashMap<String, Object>();
						auxMessageProperties.put("eventPatternName", eventPatternName);
						auxMessage.addProperties(auxMessageProperties, PropertyScope.OUTBOUND);
						eventContext.getMuleContext().getClient().dispatch("ComplexEventConsumerGlobalVM", auxMessage);
						*/
						for(int i=0; i<newComplexEvents.length;i++){
							System.out.println("		FOR===== "+newComplexEvents[i].getUnderlying());
							Map<String, Object> auxComplexEvent = new LinkedHashMap<String, Object>();
							auxComplexEvent.put(eventPatternName,newComplexEvents[i].getUnderlying());
							MuleMessage auxMessage = new DefaultMuleMessage(auxComplexEvent,eventContext.getMuleContext());
							Map<String, Object> auxMessageProperties = new HashMap<String, Object>();
							auxMessageProperties.put("eventPatternName", eventPatternName);
							auxMessage.addProperties(auxMessageProperties, PropertyScope.OUTBOUND);
							eventContext.getMuleContext().getClient().dispatch("ComplexEventConsumerGlobalVM", auxMessage);
						}
						
						
						
						
						
						/*complexEvent.put(eventPatternName, newComplexEvents[0].getUnderlying());
						/*AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA*/
						// Create the Mule message containing the complex event to be sent to the ComplexEventReceptionAndDecisionMaking flow 						
						//MuleMessage message = new DefaultMuleMessage(complexEvent, eventContext.getMuleContext());
						
						// Add messageProperties, a map containing eventPatternName, to the Mule message
						//Map<String, Object> messageProperties = new HashMap<String, Object>();
						//messageProperties.put("eventPatternName", eventPatternName);
						//message.addProperties(messageProperties, PropertyScope.OUTBOUND);
					
						// Send the created Mule message to the ComplexEventConsumerGlobalVM connector located in the ComplexEventReceptionAndDecisionMaking flow
						//eventContext.getMuleContext().getClient().dispatch("ComplexEventConsumerGlobalVM", message);
					} catch (MuleException e) {
						e.printStackTrace();
					}
				}
			}
		};
		
		pattern.addListener(genericListener);
			
		return payload.toString();
	}	
}