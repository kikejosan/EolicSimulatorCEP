package transformer;



import java.io.File;
import java.io.IOException;

import org.mule.DefaultMuleMessage;
import org.mule.api.MuleEventContext;
import org.mule.api.MuleException;
import org.mule.api.MuleMessage;
import org.mule.api.lifecycle.Callable;

import com.espertech.esper.client.EPServiceProvider;
import com.espertech.esper.client.EPStatement;
import com.espertech.esper.client.EventBean;
import com.espertech.esper.client.StatementAwareUpdateListener;

import esper.EsperUtils;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.transform.Result;
import javax.xml.transform.Source;
import javax.xml.transform.Transformer;
import javax.xml.transform.TransformerFactory;
import javax.xml.transform.dom.DOMSource;
import javax.xml.transform.stream.StreamResult;
import javax.xml.transform.stream.StreamSource;

import org.w3c.dom.Document;





public class dbConverter implements Callable { 
	
	@Override
	public Object onCall(final MuleEventContext eventContext) throws Exception {
		MuleMessage message = eventContext.getMessage();
		String nameSourceFile = message.getStringProperty("originalFilename", "Algo ha ido mal el archivo");
		System.out.println(message);
		String nombreArchivo = nameSourceFile.substring(0,nameSourceFile.lastIndexOf("."));
	
		String comando[] = new String []{"C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\powershell.exe",
				"C:\\eolic\\pxcnv.exe",
				"C:\\eolic\\archive\\"+nameSourceFile,
				"C:\\eolic\\excelFiles\\"+nombreArchivo+".csv"
				};
		
		for (int i =0; i<comando.length; i++){
			System.out.println(comando[i]);
		}
		System.out.println("@@ SYSTEM: Hola has llegado al transformador de archivos .DB");
		
		
		System.out.println("@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@");
		
		
		try {
			Runtime.getRuntime().exec(comando);
			Thread.sleep(3000);
		} catch (IOException e) {
			// TODO Auto-generated catch block
			System.out.println(e.toString());
			System.out.println("Ya he hecho el exec");
		}
		System.out.println("2@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@");
		System.out.println("HE TERMINADO LA CONVERSION DEL DB EN CSV");
			
		
		
		

		return eventContext;
		
	}	
	
}
