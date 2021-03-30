<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
  //--------------------------------------------------------------------
  // Setup
  //--------------------------------------------------------------------

  /**
   * Stores the classes that contain the
   * rules that are available.
   *
   * @var string[]
   */
    public $ruleSets = [
      Rules::class,
      FormatRules::class,
      FileRules::class,
      CreditCardRules::class,
      \App\Validation\UserRules::class,
    ];

  /**
   * Specifies the views that are used to display the
   * errors.
   *
   * @var array<string, string>
   */
    public $templates = [
      'list'   => 'CodeIgniter\Validation\Views\list',
      'single' => 'CodeIgniter\Validation\Views\single',
    ];

  //--------------------------------------------------------------------
  // Rules
  //--------------------------------------------------------------------
    public $signUp = [
      'pseudo' => [
        'label' => 'pseudo',
        'rules' => 'required|min_length[3]|max_length[15]|is_unique[membre.pseudo]',
        'errors' => [
          'required' => 'All accounts must have {field} provided',
          'min_length' => 'Pseudo is too short',
          'max_length' => 'Pseudo is too long',
          'is_unique' => 'User {field} is already taken.'
        ]
      ],
      'mail' => [
        'label' => 'mail',
        'rules' => 'required|valid_email|is_unique[membre.mail]',
        'errors' => [
          'required' => 'All accounts must have {field} provided',
          'valid_email' => 'Please check the email field, It does not appear to be valid.',
          'is_unique' => 'User {field} is already taken.'
        ]
      ],
      'password' => [
        'label' => 'password',
        'rules' => 'required|min_length[6]',
        'errors' => [
          'required' => 'All accounts must have {field} provided',
          'min_length' => 'Your password is too short. You want to get hacked ?'
        ]
      ],
      'pass_confirm' => [
        'label' => 'pass_confirm',
        'rules' => 'required|min_length[6]|matches[password]',
        'errors' => [
          'required' => 'All accounts must have {field} provided',
          'min_length' => 'Your password confirm is too short. You want to get hacked ?',
          'matches' => 'Passwords don\'t match'
        ]
      ]
    ];

    public $signIn = [
      'mail' => [
        'label' => 'mail',
        'rules' => 'required|valid_email',
        'errors' => [
          'required' => 'All accounts must have {field} provided',
          'valid_email' => 'Please check the email field, It does not appear to be valid.'
        ]
      ],
      'password' => [
        'label' => 'password',
        'rules' => 'required',
        'errors' => [
          'required' => 'All accounts must have {field} provided'
        ]
      ],
    ];
}
