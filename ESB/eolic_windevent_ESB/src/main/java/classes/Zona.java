package classes;


public class Zona {
	public double zone; 	//bin de viento
	public double media;	//media de la potencia producida en ese bin de viento
	public double desv;		//desviacion de la potencia producida en ese bin de viento
	public double N;		// nº de eventos que han caido en este bien de viento
	
	public Zona (double zone,double media,double desv,double N){
		this.zone=zone;
		this.media=media;
		this.desv=desv;
		this.N=N;
	}
	
	
	public String toString(){
		return "	zone = "+this.zone+"	media = "+this.media+" -- desv = "+this.desv+" -- N = "+this.N;
	}
	public double getMedia(){
		return media/N;
	}
}
