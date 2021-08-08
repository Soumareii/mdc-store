<?php

namespace App\Form;

use App\Entity\Products;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                "label" => 'Nom du produit',
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('price', IntegerType::class, [
                "label" => 'Prix en Fcfa',
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('description', TextareaType::class, [
                "label" => 'Description et détails du produit',
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('cover_image', FileType::class, [
                "label" => 'Image de couverture',
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('images', FileType::class, [
                "label" => 'Images du produit',
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('is_available')
            ->add('categories')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}
