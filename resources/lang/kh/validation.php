<?php

return [

    /*
    |--------------------------------------------------------------------------
    | សារ​ការផ្ទៀងផ្ទាត់
    |--------------------------------------------------------------------------
    |
    | សារ​ខាង​ក្រោម​ជា​សារ​លំនាំដើម​ដែល​ប្រើ​ដោយ​ថ្នាក់​ពិនិត្យ។  
    | មួយចំនួន​មាន​ជា​កំណែ​ច្រើន ដូចជា​ច្បាប់​ដែល​ទាក់ទង​នឹង​ទំហំ។  
    | អ្នកអាចកែប្រែសារ​ទាំងនេះឲ្យសមនឹងតម្រូវការ​របស់កម្មវិធីអ្នក។  
    |
    */

    'accepted' => ':attribute ត្រូវតែបានទទួល។',
    'accepted_if' => ':attribute ត្រូវតែបានទទួល នៅពេល :other គឺ :value។',
    'active_url' => ':attribute មិនមែនជា URL ត្រឹមត្រូវ។',
    'after' => ':attribute ត្រូវតែ​ជា​កាលបរិច្ឆេទ​ក្រោយ :date។',
    'after_or_equal' => ':attribute ត្រូវតែ​ជា​កាលបរិច្ឆេទ​ក្រោយ ឬ​ស្មើ :date។',
    'alpha' => ':attribute ត្រូវតែ​មាន​តែ​អក្សរ​ប៉ុណ្ណោះ។',
    'alpha_dash' => ':attribute ត្រូវតែ​មាន​តែ​អក្សរ លេខ សញ្ញា dash និង underscores ប៉ុណ្ណោះ។',
    'alpha_num' => ':attribute ត្រូវតែ​មាន​តែ​អក្សរ និង​លេខ។',
    'array' => ':attribute ត្រូវតែ​ជា​អារេ។',
    'before' => ':attribute ត្រូវតែ​ជា​កាលបរិច្ឆេទ​មុន :date។',
    'before_or_equal' => ':attribute ត្រូវតែ​ជា​កាលបរិច្ឆេទ​មុន ឬ​ស្មើ :date។',
    'between' => [
        'numeric' => ':attribute ត្រូវតែស្ថិតនៅចន្លោះ :min និង :max។',
        'file' => ':attribute ត្រូវតែមានទំហំចន្លោះ :min និង :max គីឡូបៃ។',
        'string' => ':attribute ត្រូវតែមានចន្លោះពី :min ដល់ :max តួអក្សរ។',
        'array' => ':attribute ត្រូវតែមានចន្លោះពី :min ដល់ :max ធាតុ។',
    ],
    'boolean' => 'វាល :attribute ត្រូវតែជា true ឬ false។',
    'confirmed' => 'ការបញ្ជាក់ :attribute មិនត្រូវគ្នាទេ។',
    'current_password' => 'ពាក្យសម្ងាត់មិនត្រឹមត្រូវ។',
    'date' => ':attribute មិនមែន​ជា​កាលបរិច្ឆេទ​ត្រឹមត្រូវ។',
    'date_equals' => ':attribute ត្រូវតែ​ជា​កាលបរិច្ឆេទ​ស្មើ :date។',
    'date_format' => ':attribute មិនផ្គូផ្គង​នឹង​ទ្រង់ទ្រាយ :format។',
    'different' => ':attribute និង :other ត្រូវតែខុសគ្នា។',
    'digits' => ':attribute ត្រូវតែមាន :digits ខ្ទង់។',
    'digits_between' => ':attribute ត្រូវតែមានចន្លោះពី :min ដល់ :max ខ្ទង់។',
    'dimensions' => ':attribute មានវិមាត្រ​រូបភាព​មិនត្រឹមត្រូវ។',
    'distinct' => 'វាល :attribute មានតម្លៃស្ទួន។',
    'email' => ':attribute ត្រូវតែ​ជា​អាសយដ្ឋាន​អ៊ីមែល​ត្រឹមត្រូវ។',
    'ends_with' => ':attribute ត្រូវបញ្ចប់ដោយ: :values។',
    'exists' => ':attribute ដែលបានជ្រើសរើសគឺមិនត្រឹមត្រូវ។',
    'file' => ':attribute ត្រូវតែជា​ឯកសារ។',
    'filled' => 'វាល :attribute ត្រូវតែមានតម្លៃ។',
    'gt' => [
        'numeric' => ':attribute ត្រូវតែធំជាង :value។',
        'file' => ':attribute ត្រូវតែធំជាង :value គីឡូបៃ។',
        'string' => ':attribute ត្រូវតែធំជាង :value តួអក្សរ។',
        'array' => ':attribute ត្រូវមានច្រើនជាង :value ធាតុ។',
    ],
    'image' => ':attribute ត្រូវតែជា​រូបភាព។',
    'in' => ':attribute ដែលបានជ្រើសរើសគឺមិនត្រឹមត្រូវ។',
    'integer' => ':attribute ត្រូវតែជា​ចំនួនគត់។',
    'json' => ':attribute ត្រូវតែ​ជា JSON ត្រឹមត្រូវ។',
    'max' => [
        'numeric' => ':attribute មិនអាចធំជាង :max។',
        'file' => ':attribute មិនអាចធំជាង :max គីឡូបៃ។',
        'string' => ':attribute មិនអាចលើសពី :max តួអក្សរ។',
        'array' => ':attribute មិនអាចលើសពី :max ធាតុ។',
    ],
    'min' => [
        'numeric' => ':attribute ត្រូវតែយ៉ាងហោចណាស់ :min។',
        'file' => ':attribute ត្រូវតែយ៉ាងហោចណាស់ :min គីឡូបៃ។',
        'string' => ':attribute ត្រូវតែយ៉ាងហោចណាស់ :min តួអក្សរ។',
        'array' => ':attribute ត្រូវតែមានយ៉ាងហោចណាស់ :min ធាតុ។',
    ],
    'numeric' => ':attribute ត្រូវតែជា​លេខ។',
    'required' => 'វាល :attribute ត្រូវតែបំពេញ។',
    'same' => ':attribute និង :other ត្រូវតែដូចគ្នា។',
    'size' => [
        'numeric' => ':attribute ត្រូវតែ :size។',
        'file' => ':attribute ត្រូវតែមានទំហំ :size គីឡូបៃ។',
        'string' => ':attribute ត្រូវតែមាន :size តួអក្សរ។',
        'array' => ':attribute ត្រូវតែមាន :size ធាតុ។',
    ],
    'string' => ':attribute ត្រូវតែ​ជា​អត្ថបទ។',
    'timezone' => ':attribute ត្រូវតែជា​តំបន់ពេលវេលាត្រឹមត្រូវ។',
    'unique' => ':attribute ត្រូវបានប្រើរួចហើយ។',
    'url' => ':attribute ត្រូវតែជា URL ត្រឹមត្រូវ។',
    'uuid' => ':attribute ត្រូវតែជា UUID ត្រឹមត្រូវ។',

    /*
    |--------------------------------------------------------------------------
    | សារ​ផ្ទាល់ខ្លួន​សម្រាប់​ការ​ផ្ទៀងផ្ទាត់
    |--------------------------------------------------------------------------
    |
    | អ្នក​អាចបញ្ជាក់​សារ​ផ្ទាល់ខ្លួន​សម្រាប់​លក្ខណៈ​ពិសេស​​ដោយ​ប្រើ
    | conven​tion "attribute.rule" ដើម្បីបញ្ជាក់សារ។
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'សារផ្ទាល់ខ្លួន',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | សារ​ផ្ទាល់ខ្លួន​សម្រាប់​លក្ខណៈ
    |--------------------------------------------------------------------------
    |
    | បន្ទាត់ខាងក្រោម​ប្រើសម្រាប់ប្ដូរ​ឈ្មោះ​​ attribute ជាភាសា​ដែល​អ្នកប្រើប្រាស់​ចំណាយ​ងាយនឹងយល់។
    |
    */

    'attributes' => [],

];
