package classes;

public class Zona {
	public double zone;
	public double media;
	public double desv;
	public double N;
	
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
