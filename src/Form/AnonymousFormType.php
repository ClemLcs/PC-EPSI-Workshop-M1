<?php

namespace App\Form;

use App\Entity\Anonymous;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class AnonymousFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudo', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a pseudo',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Your pseudo should be at least {{ limit }} characters',
                        'max' => 20,
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'Male' => 'male',
                    'Female' => 'female',
                    'Other' => 'other',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please select your sex',
                    ]),
                ],
            ])
            ->add('old_anonymous', DateType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter your age.',
                    ]),
                    // 'widget' => 'single_text',
                    // 'html5' => false,
                    // 'attr' => ['class' => 'datepicker'],
                    // 'years' => range(date('Y') - 10, date('Y') + 10), // Vous pouvez ajuster la plage d'années ici
                ],
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Anonymous::class,
        ]);
    }
}
