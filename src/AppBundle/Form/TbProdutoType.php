<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class TbProdutoType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add(
                'nome',
                TextType::class,
                array(
                    'label' => 'Nome',
                    'required' => true,
                    'attr' => array (
                    )
                )
            )
            ->add(
                'valor',
                MoneyType::class,
                array(
                    'label'    => 'Valor',
                    'required' => true,
                )
            );
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\TbProduto',
            'csrf_protection' => false,
            'allow_extra_fields' => true,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'produto';
    }
}
