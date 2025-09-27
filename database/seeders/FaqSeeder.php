<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
  public function run(): void
  {
    $faqs = [
      [
        'q' => 'What is a Virtual USD Card?',
        'a' => 'A Virtual USD Card is a digital payment card that allows you to make online purchases in USD without the need for a physical card. It provides a secure and convenient way to shop online.',
      ],
      [
        'q' => 'How do I create a Virtual USD Card on DgnRavePay?',
        'a' => 'To create a Virtual USD Card on DgnRavePay, log in to your account, navigate to the "Cards" section, and follow the prompts to generate a new virtual card.',
      ],
      [
        'q' => 'Where can I use the Virtual USD Card?',
        'a' => 'You can use your Virtual USD Card for online purchases at any merchant that accepts USD payments. This includes international websites and services.',
      ],
      [
        'q' => 'What currencies can I fund my Virtual USD Card with?',
        'a' => 'You can fund your Virtual USD Card with various currencies, including NGN (Nigerian Naira) and other supported currencies available on the DgnRavePay platform.',
      ],
      [
        'q' => 'Are there fees for using the Virtual USD Card?',
        'a' => 'Yes, there may be fees associated with using the Virtual USD Card, including transaction fees and currency conversion fees. Please refer to the DgnRavePay fee schedule for more information.',
      ],
      [
        'q' => 'What are the limits on the Virtual USD Card?',
        'a' => "The limits on the Virtual USD Card may vary based on your account verification level and DgnRavePay's policies. Please check the DgnRavePay website or app for the most up-to-date information on card limits.",
      ],
      [
        'q' => 'How secure is my Virtual USD Card?',
        'a' => "Your Virtual USD Card is secured with advanced encryption and fraud detection measures. However, it's essential to follow best practices for online security, such as using strong passwords and enabling two-factor authentication on your DgnRavePay account.",
      ],
      [
        'q' => 'Can I have more than one Virtual USD Card?',
        'a' => 'Yes, you can have multiple Virtual USD Cards on DgnRavePay. Each card can be funded and used separately, allowing for better management of your spending and budgeting.',
      ],
      [
        'q' => 'What happens if my Virtual USD Card is compromised?',
        'a' => 'If your Virtual USD Card is compromised, you should immediately contact DgnRavePay customer support to report the issue. They will assist you in securing your account and may issue a new card to prevent unauthorized transactions.',
      ],
      [
        'q' => 'Do I need to verify my identity (KYC) to use the card?',
        'a' => 'Yes, DgnRavePay requires users to complete identity verification (KYC) to use the Virtual USD Card. This process helps ensure the security and compliance of the platform.',
      ],
    ];

    foreach ($faqs as $f) {
      Faq::updateOrCreate(
        ['question' => $f['q']],
        [
          'question' => $f['q'],
          'answer' => $f['a'],
          'is_published' => true,
        ]
      );
    }
  }
}
