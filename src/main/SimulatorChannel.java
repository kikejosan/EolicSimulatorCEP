package main;
import java.sql.Date;

import com.funapp.thingspeak.Channel;
import com.funapp.thingspeak.Entry;
import com.funapp.thingspeak.ThingSpeakException;
import com.mashape.unirest.http.exceptions.UnirestException;

/**
 * @author Iván Fernádez de la Rosa & Juan Boubeta-Puig (University of Cádiz)
 * @version 2.0 November, 14th 2015. Updated by Daniel Payán Alcedo.
 */
public class SimulatorChannel 
{
	private Channel channel;
	private Entry entry;
		
	public SimulatorChannel(String apiKey, int channelId)
	{
		channel = new Channel(channelId, apiKey);
		entry = new Entry();
	}
	
	public String getChannelName()
	{
		try {
			return channel.getChannelFeed().getChannelName();
		} catch (UnirestException | ThingSpeakException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return "";
	}
	
	public void setDataField(int field, double value)
	{
		entry.setField(field, String.valueOf(value));
	}
	/* LO HA PUESTO KIKE */
	public void setDataField(int field, String value) {
		entry.setField(field, value);
	}
	public void setDataField(int field, int value) {
		entry.setField(field, String.valueOf(value));
	}
	public void setDataField(int field, Date value) {
		entry.setField(field, value.toString());
	}
	/*KIKEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE*/
	public String getStatus()
	{
		return entry.getStatus();
	}
	
	
	public void sendData()
	{
		try {
			channel.update(entry);
		} catch (UnirestException | ThingSpeakException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
}
