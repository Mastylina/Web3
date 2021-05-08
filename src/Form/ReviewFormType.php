<?php

namespace App\Form;

use App\Entity\Review;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\Length;

class ReviewFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('commentBody', TextareaType::class, [
                'required' => true,
                'mapped' => false,
                'constraints' => [
                    new Length([
                        'min' => 3,
                        'minMessage' => 'The comment must be more than three characters!',
                        'max' => 255,
                    ]),
                ],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Send',
                'attr' => ['class' => 'btn btn-primary w-100 mt-2'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Review::class,
        ]);
    }
}
