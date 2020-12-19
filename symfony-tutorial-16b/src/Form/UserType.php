<?php

namespace App\Form;

use App\Entity\Role;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UserType extends AbstractType
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $entity = $builder->getData();

        $rolesChoices = [];
        $roles = $this->entityManager->getRepository(Role::class)->findAll();
        foreach ($roles as $rol) {
            $rolesChoices[$rol->__toString()] = $rol->getId();
        }

        $builder
            ->add('email')
            ->add('roles_in_form', ChoiceType::class, [
                'mapped' => false,
                'expanded' => true,
                'multiple' => true,
                'choices' => $rolesChoices,
                'data' => $entity->getRolesIds(),
            ])
            ->add('password', null, ['data' => ''])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
