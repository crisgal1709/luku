<?php 

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;

trait HasArchivos{
	

	public static function bootHasArchivos()
	{
		static::deleting(function($archivo){
			//
		});
	}

	//Relación polimórfica al model Archivos.
	public function archivos(){
		return $this->morphMany(\App\Models\Archivo::class, 'archivable');
	}

	public function guardarArchivos($request)
	{
		if (!$request->has('archivos')) {
			return;
		}

		foreach($request->file('archivos') as $archivo)
		{
			$this->guardarArchivo($archivo);
		}
	}

	public function guardarArchivo(UploadedFile $archivo)
	{
		$path = $this->getCarpetaGuardar();
		$nombre = $archivo->getClientOriginalName();
		$size = $archivo->getSize();
		$nombreGuardar = $this->resolveNameGuardar($nombre);

		$archivo->storeAs(
				$path, 
				$nombreGuardar,
				config('filesystems.default')
			);

		$data = [
			'path' => $path . '/' . $nombreGuardar,
			'nombre' => $nombre,
			'tamanio' => $size,
			'disk' => config('filesystems.default'),
		];

		$this->archivos()->create($data);
	}

	public function getCarpetaGuardar()
	{
		return strtolower(Arr::last(explode('\\', static::class))) . 's';
	}

	public function resolveNameGuardar($nombre)
	{
		return config('filesystems.default') == 's3'
					? 's3' . '_' . time() . '_' . $nombre
					:  time() . '_' . $nombre;
	}

}