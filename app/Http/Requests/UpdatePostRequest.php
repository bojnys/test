<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdatePostRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
    public function rules(){
        $songs = $this->route('posts');
        return [
            'title' => 'required|unique:posts,title,'.$songs->id,
            'content' => 'required',
            'slug' => 'required|unique:posts,slug,'.$songs->id
        ];
    }

}
