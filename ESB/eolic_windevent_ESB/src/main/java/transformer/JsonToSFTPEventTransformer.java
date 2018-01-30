package transformer;
import java.text.DecimalFormat;
import java.util.LinkedHashMap;
import java.util.Map;

import org.codehaus.jackson.JsonNode;
import org.codehaus.jackson.map.ObjectMapper;
import org.mule.api.MuleMessage;
import org.mule.api.transformer.TransformerException;
import org.mule.transformer.AbstractMessageTransformer;

public class JsonToSFTPEventTransformer extends AbstractMessageTransformer{

	DecimalFormat df2 = new DecimalFormat("#,00");

	@Override
	public Object transformMessage(MuleMessage message, String outputEncoding) throws TransformerException {
		// TODO Auto-generated method stub
		Map<String, Object> eventMap = new LinkedHashMap<String, Object>();
		ObjectMapper mapper = new ObjectMapper();
		JsonNode jsonNode = null;
		
		try{
			
		}catch(Exception e){
			System.out.println("¡HAY UN ERROR! KIKE");
		}
		
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
