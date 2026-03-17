<?php

class Clienta
{
    private string $nombre;
    private string $colorPelo;
    private bool $peloLargo;
    private bool $peloMojado;

    public function __construct(string $nombre, string $colorPelo, bool $peloLargo){
        $this->nombre = $nombre;
        $this->colorPelo = $colorPelo;
        $this->peloLargo = $peloLargo;
        $peloMojado = false;
    }

    /**
     * Devuelve la información de la clienta en el formato "Clienta: nombre"
     * @return string
     */
    public function MostrarInfo():string
    {
        return "Clienta: {$this->nombre}";
    }

    /**
     * Le corta el pelo a la clienta, solamente se le puede cortar el pelo si lo tiene largo.
     * @return bool devuelve true si se le ha cortado el pelo y false si no
     */
    public function CortarPelo():bool
    {
        if($this->peloLargo){
            $this->peloLargo = false;
            return true;
        }else{
            return false;
        }
    }

    /**
     * Le moja el pelo a la clienta, solamente se le puede mojar el pelo si lo tenía seco
     * @return bool devuelve true si le ha mojado el pelo y false si no ha podido
     */
    public function MojarPelo():bool
    {
        if($this->peloMojado){
            return false;
        }else{
            $this->peloMojado = true;
            return true;
        }
    }

    /**
     * Seca el pelo a la clienta, solamente se le puede secar el pelo si lo tenía mojado
     * @return bool devuelve true si se le ha secado el pelo y false si no ha podido
     */
    public function SecarPelo():bool
    {
        if($this->peloMojado){
            $this->peloMojado = false;
            return true;
        }else{
            return false;
        }
    }

    /**
     * Devuelve el estado del pelo de la clienta de la siguiente forma Nombre: pelo [largo, corto], [mojado, seco] y de color: color
     * @return string
     */
    public function MostrarEstado():string{
        $largura = $this->peloLargo ? "largo" : "corto";
        $humedad = $this->peloMojado ? "mojado" : "seco";
        return "$this->nombre: pelo $largura, $humedad y de color: {$this->colorPelo}";
    }

}
