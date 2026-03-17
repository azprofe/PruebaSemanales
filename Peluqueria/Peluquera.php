<?php

class Peluquera
{
    private string $nombre;

    public function __construct(string $nombre){
        $this->nombre = $nombre;
    }

    /**
     * Muestra la información de la peluquera de la siguiente forma: Peluquera: nombre
     * @return string
     */
    public function MostrarInfo():string{
        return "Peluquera: " . $this->nombre;
    }

    /**
     * Corta el pelo a una clienta, para cortar pelo tiene que tenerlo largo
     * @param Clienta $clienta
     * @return string Devuelve información ejemplo: Peluquera nombre le ha cortado el pelo a Clienta: nombre
     */
    public function Cortar(Clienta $clienta):string{
        if($clienta->CortarPelo()){
            return "{$this->MostrarInfo()} le ha cortado el pelo a {$clienta->MostrarInfo()}";
        }else{
            return "{$this->MostrarInfo()} no ha cortado el pelo a {$clienta->MostrarInfo()} porque ya lo tenía corto";
        }
    }

    /**
     * Lava el pelo a Clienta, solamente puedes lavarle el pelo si lo tiene seco
     * @param Clienta $clienta
     * @return string Devuelve información ejemplo: Peluquera nombre le ha lavado el pelo a Clienta: nombre
     */
    public function Lavar(Clienta $clienta):string{
        if($clienta->MojarPelo()){
            return "{$this->MostrarInfo()} le ha lavado el pelo a {$clienta->MostrarInfo()}";
        }else{
            return "{$this->MostrarInfo()} NO le ha lavado el pelo a {$clienta->MostrarInfo()} porque ya lo tenía mojado";
        }
    }

    /**
     * Seca el pelo a una clienta, solamente puedes secarle el pelo si lo tiene mojado
     * @param Clienta $clienta
     * @return string Devuelve información ejemplo: Peluquera nombre le ha secado el pelo a Clienta: nombre
     */
    public function Secar(Clienta $clienta):string{
        if($clienta->SecarPelo()){
            return "{$this->MostrarInfo()} le ha secado el pelo a {$clienta->MostrarInfo()}";
        } else{
            return "{$this->MostrarInfo()} NO le ha secado el pelo a {$clienta->MostrarInfo()} porque ya lo tenía seco";
        }
    }
}
