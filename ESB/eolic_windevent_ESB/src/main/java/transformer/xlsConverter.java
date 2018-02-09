package transformer;



import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.FileInputStream;
import java.io.*;
import org.apache.poi.hssf.usermodel.HSSFSheet;
import java.util.Iterator;
import org.apache.poi.ss.usermodel.*;






import org.mule.api.MuleEventContext;
import org.mule.api.MuleMessage;
import org.mule.api.lifecycle.Callable;

import au.com.bytecode.opencsv.CSVWriter;
import esper.EsperUtils;


public class xlsConverter implements Callable { 
	
	@Override
	public Object onCall(final MuleEventContext eventContext) throws Exception {
		Thread.sleep(1000);
		MuleMessage message = eventContext.getMessage();
		//String nombreArchivoC = message.getStringProperty("originalFilename", "Hola jefe");
		String nombreArchivoC = "misDatos.xls";
		String nombreArchivo = nombreArchivoC.substring(0,nombreArchivoC.lastIndexOf("."));
		
		String programa = "C:\\converterXlsToCsv.vbs",
				ejecutarEnConsola = "-c",
				rutaEntrada = "C:\\eolic\\archive\\"+nombreArchivoC,
				rutaSalida = "C:\\eolic\\input\\"+nombreArchivo+".csv";
				
				
			String comando[] = new String[]{"C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\powershell.exe", 
					programa,
					rutaEntrada,
					rutaSalida};
		for(int i=0;i<comando.length; i++){
			System.out.println(comando[i]);
		}
		
		
		System.out.println("@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@");
		try {
			 Runtime.getRuntime().exec(comando);
			 
		} catch (IOException e) {
			// TODO Auto-generated catch block
			System.out.println(e.toString());
			System.out.println("Ya he hecho el exec");
		}
		System.out.println("2@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@");
		System.out.println("HE TERMINADO LA CONVERSION DEL XLS EN CSV");
		
		return eventContext;
		
	}	
}
