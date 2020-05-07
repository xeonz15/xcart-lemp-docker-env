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

/* /home/vagrant/next/output/xcart/src/skins/customer/modules/XC/Reviews/reviews_page/parts/title.right.twig */
class __TwigTemplate_33d8dced7abd1106462f3e95ade3b1c0ab362b9b65e13563bf8a0801ba965361 extends \XLite\Core\Templating\Twig\Template
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
        echo "<div class=\"right-actions\">
  ";
        // line 7
        if ($this->getAttribute(($context["this"] ?? null), "isOnModeration", [0 => $this->getAttribute(($context["this"] ?? null), "review", [])], "method")) {
            // line 8
            echo "    <div class=\"moderation\">";
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["On moderation"]), "html", null, true);
            echo "</div>
  ";
        }
        // line 10
        echo "  ";
        if ($this->getAttribute(($context["this"] ?? null), "isOwnReview", [0 => $this->getAttribute(($context["this"] ?? null), "review", [])], "method")) {
            // line 11
            echo "    <div class=\"separator\"></div>
  ";
        }
        // line 13
        echo "  ";
        if ($this->getAttribute(($context["this"] ?? null), "isOwnReview", [0 => $this->getAttribute(($context["this"] ?? null), "review", [])], "method")) {
            // line 14
            echo "    <div class=\"buttons\">
      ";
            // line 15
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget')->getCallable(), [$this->env, $context, [0 => "\\XLite\\Module\\XC\\Reviews\\View\\Button\\Customer\\EditReview", "label" => " ", "review" => $this->getAttribute(($context["this"] ?? null), "review", [])]]), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 18
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "/home/vagrant/next/output/xcart/src/skins/customer/modules/XC/Reviews/reviews_page/parts/title.right.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 18,  54 => 15,  51 => 14,  48 => 13,  44 => 11,  41 => 10,  35 => 8,  33 => 7,  30 => 6,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "/home/vagrant/next/output/xcart/src/skins/customer/modules/XC/Reviews/reviews_page/parts/title.right.twig", "");
    }
}
