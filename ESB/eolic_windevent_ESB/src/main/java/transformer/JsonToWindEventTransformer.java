package transformer;

import java.text.DecimalFormat;
import java.util.LinkedHashMap;
import java.util.Map;

import org.codehaus.jackson.JsonNode;
import org.codehaus.jackson.map.ObjectMapper;
import org.mule.api.MuleMessage;
import org.mule.api.transformer.TransformerException;
import org.mule.transformer.AbstractMessageTransformer;

public class JsonToWindEventTransformer extends AbstractMessageTransformer{

	DecimalFormat df2 = new DecimalFormat("#,00");

	@Override
	public Object transformMessage(MuleMessage message, String outputEncoding) throws TransformerException {
		// TODO Auto-generated method stub
		Map<String, Object> eventMap = new LinkedHashMap<String, Object>();
		ObjectMapper mapper = new ObjectMapper();
		JsonNode jsonNode = null;
		
		/*{"channel":{	"id":401291,
		 * 			  	"name":"prueba",
		 * 			  	"description":"Es un canal de prueba que reciba un INTEGER y una STRING",
		 * 			  	"latitude":"0.0","longitude":"0.0",
		 * 			  	"field1":"numero1",
		 * 			  	"field2":"numero2",
		 * 				"field3":"numero3",
		 * 				"field4":"numero4",
		 * 				"field5":"numero5",
		 * 				"field6":"numero6",
		 * 				"field7":"numero7",
		 * 				"field8":"numero8",
		 * 				"created_at":"2018-01-11T10:33:57Z",
		 * 				"updated_at":"2018-01-15T10:15:35Z",
		 * 				"last_entry_id":9
		 * 				},
		 * "feeds":[{	"created_at":"2018-01-15T10:15:35Z",
		 * 			 	"entry_id":9,
		 * 			 	"field1":"1.0",
		 * 				"field2":"2.0",
		 * 				"field3":"3.0",
		 * 				"field4":"4.0",
		 * 				"field5":"5.0",
		 * 				"field6":"6.0",
		 * 				"field7":"7.0",
		 * 				"field8":"8.0"}]}*/
		
		try{
			jsonNode = mapper.readTree(message.getPayloadAsString());
			Map<String, Object> location = new LinkedHashMap<String, Object>();
	        location.put("latitude", jsonNode.get("channel").get("latitude").asDouble());
	        location.put("longitude",jsonNode.get("channel").get("longitude").asDouble());
	        
	        
			Map<String, Object> eventPayload = new LinkedHashMap<String, Object>();
			eventPayload.put("channelID", jsonNode.get("channel").get("id").asInt());
			eventPayload.put("timestamp", jsonNode.get("feeds").path(0).get("created_at").getTextValue());
			eventPayload.put("id_Event", jsonNode.get("feeds").path(0).get("entry_id").asInt());
			eventPayload.put("ind", jsonNode.get("feeds").path(0).get("field1").asInt());
			eventPayload.put("sysNumber", jsonNode.get("feeds").path(0).get("field2").asInt());
			eventPayload.put("date", jsonNode.get("feeds").path(0).get("field3").getTextValue());
			eventPayload.put("time", jsonNode.get("feeds").path(0).get("field4").getTextValue());
			eventPayload.put("timeOffset", jsonNode.get("feeds").path(0).get("field5").asInt());
			eventPayload.put("count", jsonNode.get("feeds").path(0).get("field6").asInt());
			eventPayload.put("power", jsonNode.get("feeds").path(0).get("field7").asDouble());
			eventPayload.put("towerDeflection", jsonNode.get("feeds").path(0).get("field8").asDouble());
			
			
			
			
			if (jsonNode.get("channel").get("name").getTextValue().trim().equals("prueba")) { 
	            location.put("name", "Albacete");
	        }else{
	            location.put("name", "Albacete");

	        }
			System.out.println("ESTE ESSSS ::::::::: ");
			System.out.println(jsonNode);
			System.out.println("VAMOS A MOSTRAR EVENTPAULOAD");
			System.out.println(eventPayload);
			
			eventPayload.put("location", location);
	        eventMap.put("WindEvent", eventPayload);
		}catch(Exception e){
			System.out.println("¡HAY UN ERROR! KIKE");
		}
		System.out.println("SOY UNA IMPRESION DE LAS BUENAS BUENAS jejejeje");
		
		System.out.println("===WindEvent created: " + eventMap);
		return eventMap;
	}
	public static String openFileToString(byte[] _bytes)
	{
	    String file_string = "";

	    for(int i = 0; i < _bytes.length; i++)
	    {
	        file_string += (char)_bytes[i];
	    }

	    return file_string;    
	}

}
