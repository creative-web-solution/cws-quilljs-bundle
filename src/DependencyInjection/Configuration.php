<?php

declare(strict_types=1);

namespace Cws\Bundle\QuillJsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $builder = new TreeBuilder(name: 'cws_quill_js');

        $builder->getRootNode()
            ->children()
                ->booleanNode(name: 'enabled')
                    ->defaultTrue()
                ->end()
                ->scalarNode(name: 'config_name')
                    ->defaultValue(value: 'default')
                ->end()
                ->booleanNode(name: 'edit_html')
                    ->defaultTrue()
                ->end()
                ->scalarNode(name: 'theme')
                    ->defaultValue(value: 'snow')
                ->end()
                ->scalarNode(name: 'js_source')
                    ->defaultValue(value: 'https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js')
                ->end()
                ->scalarNode(name: 'css_source')
                    ->defaultValue(value: 'https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css')
                ->end()
                ->variableNode(name: 'toolbar')
                    ->info(info: 'This option can be an array or a scalar')
                    ->validate()
                        ->ifTrue(closure: function ($value) {
                            return !is_array(value: $value) && !is_scalar(value: $value) && !is_bool(value: $value);
                        })
                        ->thenInvalid(message: 'Invalid type for "toolbar": expected scalar or array.')
                    ->end()
                ->end()
            ->end()
        ;

        return $builder;
    }
}
