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



public class AddEventPatternToEsperComponent implements Callable { 
	
	@Override
	public Object onCall(final MuleEventContext eventContext) throws Exception {
		/* 
		 * Obtenemos el payload que es el mensaje de Mule de entrada para incorporar el patrón al motor CEP */
		final Object payload = eventContext.getMessage().getPayload();		
		final EPStatement pattern = EsperUtils.addNewEventPattern(payload.toString());
						
		/* Adherimos un listener a cada patrón, de forma que cuando es detectado se envía al flujo de despliegue*/
		StatementAwareUpdateListener genericListener = new StatementAwareUpdateListener() {
			
			@Override
			public void update(EventBean[] newComplexEvents, EventBean[] oldComplexEvents, 
				EPStatement detectedEventPattern, EPServiceProvider serviceProvider) {
				
				
				if (newComplexEvents != null) {	
					try {
						System.out.println("	ATENCION!: SE HA DETECTADO UN EVENTO COMPLEJO");
						System.out.println("		===== Payload del Evento Complejo:" + newComplexEvents[0].getUnderlying());
						
						String eventPatternName = detectedEventPattern.getEventType().getName();
						System.out.println("		===== Tipo de Evento Complejo: " + eventPatternName);

					
						System.out.println("		===== Estamos leyendo LA COLA DE EVENTOS COMPLEJOS");
						
						
						/* El patrón puede disparar varios eventos complejos a la vez, por tanto deberemos de enviar
						 * toda la cola de eventos complejos a nuestro flujo de despliegue*/
						for(int i=0; i<newComplexEvents.length;i++){
							System.out.println("	===== Procesando y enviando a despliegue Evento Complejo: "+newComplexEvents[i].getUnderlying());
							/* Obtenemos el evento complejo de la cola*/
							Map<String, Object> auxComplexEvent = new LinkedHashMap<String, Object>();
							auxComplexEvent.put(eventPatternName,newComplexEvents[i].getUnderlying());
							/* Lo transformamos a un mensaje de Mule para desplegarlo y le añadimos el tipo del evento complejo al mensaje de Mule*/
							MuleMessage auxMessage = new DefaultMuleMessage(auxComplexEvent,eventContext.getMuleContext());
							Map<String, Object> auxMessageProperties = new HashMap<String, Object>();
							auxMessageProperties.put("eventPatternName", eventPatternName);
							auxMessage.addProperties(auxMessageProperties, PropertyScope.OUTBOUND);
							/* Enviamos el mensaje al flujo de despliegue */
							eventContext.getMuleContext().getClient().dispatch("ComplexEventConsumerGlobalVM", auxMessage);
						}

					} catch (MuleException e) {
						e.printStackTrace();
					}
				}
			}
		};
		
		System.out.println(" @MOTOR CEP: Patrón incorporado = "+pattern.getName());
		pattern.addListener(genericListener);
			
		return payload.toString();
	}	
}