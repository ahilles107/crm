<?php

namespace PH\PaymentHubBundle\Form\Type;

use Oro\Bundle\FormBundle\Form\Type\OroDateType;
use PH\PaymentHubBundle\Entity\SubscriptionBankAccount;
use PH\PaymentHubBundle\Entity\SubscriptionInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangeBankAccountSubscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('amount')
            ->add('interval', ChoiceType::class, [
                'placeholder' => ' ',
                'choices' => [
                    SubscriptionInterface::INTERVAL_MONTH => 'Monthly',
                    SubscriptionInterface::INTERVAL_QUARTERLY => 'Quarterly',
                    SubscriptionInterface::INTERVAL_YEAR => 'Yearly',
                ],
            ])
            ->add('startDate', OroDateType::class, [
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => SubscriptionBankAccount::class,
        ));
    }

    public function getName()
    {
        return 'subscriptions_change_bank_account';
    }
}
