<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* /home/vagrant/next/output/xcart/src/skins/admin/states/header.twig */
class __TwigTemplate_0e142b0f49ed96fa8d970c4888c3cd83bc49c85891bb514023680412095c6595 extends \XLite\Core\Templating\Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 6
        echo "
";
        // line 7
        if ($this->getAttribute(($context["this"] ?? null), "getCountriesWithStates", [], "method")) {
            // line 8
            echo "  <ul class=\"states-list\">
    ";
            // line 9
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["this"] ?? null), "getCountriesWithStates", [], "method"));
            foreach ($context['_seq'] as $context["id"] => $context["country"]) {
                // line 10
                echo "      <li>
        ";
                // line 11
                if (($this->getAttribute($context["country"], "code", []) != $this->getAttribute(($context["this"] ?? null), "getCountryCode", [], "method"))) {
                    // line 12
                    echo "          <a href=\"";
                    echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('url')->getCallable(), [$this->env, $context, "states", "", ["country_code" => $this->getAttribute($context["country"], "getCode", [], "method")]]), "html", null, true);
                    echo "\">";
                    echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute($context["country"], "getCountry", [], "method"), "html", null, true);
                    echo "</a>
        ";
                }
                // line 14
                echo "        ";
                if (($this->getAttribute($context["country"], "code", []) == $this->getAttribute(($context["this"] ?? null), "getCountryCode", [], "method"))) {
                    // line 15
                    echo "          <span>";
                    echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute($context["country"], "getCountry", [], "method"), "html", null, true);
                    echo "</span>
        ";
                }
                // line 17
                echo "      </li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['id'], $context['country'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "  </ul>
";
        }
    }

    public function getTemplateName()
    {
        return "/home/vagrant/next/output/xcart/src/skins/admin/states/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 19,  64 => 17,  58 => 15,  55 => 14,  47 => 12,  45 => 11,  42 => 10,  38 => 9,  35 => 8,  33 => 7,  30 => 6,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "/home/vagrant/next/output/xcart/src/skins/admin/states/header.twig", "");
    }
}
