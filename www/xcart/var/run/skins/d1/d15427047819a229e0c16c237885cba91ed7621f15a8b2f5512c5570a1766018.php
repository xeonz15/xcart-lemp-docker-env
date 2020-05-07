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

/* profiles/parts/cell/orders.twig */
class __TwigTemplate_21a6a1e7b73ce980681896028436b59f24b1ac291a6581e955a0c456aed43437 extends \XLite\Core\Templating\Twig\Template
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
        // line 4
        echo "
";
        // line 5
        if (($this->getAttribute($this->getAttribute(($context["this"] ?? null), "entity", []), "orders_count", []) && $this->getAttribute($this->getAttribute(($context["this"] ?? null), "auth", []), "isPermissionAllowed", [0 => "manage orders"], "method"))) {
            // line 6
            echo "  <a href=\"";
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('url')->getCallable(), [$this->env, $context, "order_list", "searchByCustomer", ["profileId" => $this->getAttribute($this->getAttribute(($context["this"] ?? null), "entity", []), "profile_id", [])]]), "html", null, true);
            echo "\">";
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["this"] ?? null), "entity", []), "orders_count", []), "html", null, true);
            echo "</a>
";
        } elseif (($this->getAttribute($this->getAttribute(        // line 7
($context["this"] ?? null), "entity", []), "orders_count", []) &&  !$this->getAttribute($this->getAttribute(($context["this"] ?? null), "auth", []), "isPermissionAllowed", [0 => "manage orders"], "method"))) {
            // line 8
            echo "  ";
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["this"] ?? null), "entity", []), "orders_count", []), "html", null, true);
            echo "
";
        } else {
            // line 10
            echo "  0
";
        }
    }

    public function getTemplateName()
    {
        return "profiles/parts/cell/orders.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 10,  44 => 8,  42 => 7,  35 => 6,  33 => 5,  30 => 4,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "profiles/parts/cell/orders.twig", "/var/www/xcart/skins/admin/profiles/parts/cell/orders.twig");
    }
}
