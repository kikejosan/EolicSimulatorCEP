package esper;

import java.util.HashMap;
import java.util.LinkedHashMap;
import java.util.Map;

import org.mule.DefaultMuleMessage;
import org.mule.api.MuleEventContext;
import org.mule.api.MuleException;
import org.mule.api.MuleMessage;
import org.mule.api.annotations.param.Payload;
import org.mule.api.lifecycle.Callable;
import org.mule.api.transport.PropertyScope;

import com.espertech.esper.client.EPServiceProvider;
import com.espertech.esper.client.EPStatement;
import com.espertech.esper.client.EventBean;
import com.espertech.esper.client.StatementAwareUpdateListener;


/**
 * @author Juan Boubeta-Puig <juan.boubeta@uca.es>
 *
 */
public class Watcher implements Callable { 
	
	@Override
	public Object onCall(final MuleEventContext eventContext) throws Exception {
		
		final Object payload = eventContext.getMessage().getPayload();		
		System.out.println("Watcher**** "+payload.toString());
			
		return payload.toString();
	}	
}