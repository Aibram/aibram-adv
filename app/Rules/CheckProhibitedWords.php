<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckProhibitedWords implements Rule
{
    protected $words,$badWord;
    
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(array $words)
    {
        $this->words = $words;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->badWord = $this->noWordsMatched($value);
        return empty($this->badWord);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.badWord',['word'=>$this->badWord]);
    }

    private function noWordsMatched($desc){
        foreach($this->words as $word){
            if (str_contains($desc, $word['word'])) {
                return $word['word'];
            }
        }
        return "";
    }
}
