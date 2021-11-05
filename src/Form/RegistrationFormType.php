<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => false,
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter les termes d\'utilisation',
                    ]),
                ],
            ])
            ->add('password', PasswordType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('confirm', PasswordType::class, [
                'label' => false,
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('username', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('number', NumberType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('location', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add(
                'sex',
                ChoiceType::class,
                [
                    'label' => false,
                    'attr' => [
                        'class' => 'form-control'
                    ],
                    'choices' => $this->getChoice(),
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }

    private function getChoice()
    {
        $choices = [
            "M",
            "F"
        ];

        $output = [];

        foreach ($choices as $key => $value) {
            $output[$value] = $key;
        }
        return $output;
    }
}
