<?php

declare(strict_types=1);

namespace Cws\Bundle\QuillJsBundle\Form\Type;

use Cws\Bundle\QuillJsBundle\Service\QuillJsConfigInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuillJsType extends AbstractType
{
    public function __construct(private QuillJsConfigInterface $quillJsConfig)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        $view->vars['quilljs'] = $options['quilljs'] ?? null;
    }

    /**
     * {@inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'quilljs' => $this->quillJsConfig->getConfig(),
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function getParent(): string
    {
        return TextareaType::class;
    }

    /**
     * {@inheritDoc}
     */
    public function getBlockPrefix(): string
    {
        return 'quilljs';
    }
}
