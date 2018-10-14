<?php 

namespace App\Traits;

trait HasUser{

	public static function bootHasUser(){
		static::creating(function($model){
			$model->user_id = !is_null(auth()->user()) 
						? auth()->user()->id
						: 0; 
		});
	}

	/**
	 * HasUser belongs to Usuario.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function usuario()
	{
		// belongsTo(RelatedModel, foreignKey = usuario_id, keyOnRelatedModel = id)
		return $this->belongsTo(\App\User::class, 'user_id');
	}

}