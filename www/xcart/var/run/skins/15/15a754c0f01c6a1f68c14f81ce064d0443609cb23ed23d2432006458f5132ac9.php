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

/* items_list/model/table/profile/cell.last_login.twig */
class __TwigTemplate_1826801808b5cd22a6fe02eb5f7b62f77b4129e7084a514622860536e5b18b52 extends \XLite\Core\Templating\Twig\Template
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
        if ($this->getAttribute($this->getAttribute(($context["this"] ?? null), "entity", []), "getLastLogin", [], "method")) {
            // line 5
            echo "    <span class=\"date\">";
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "formatDate", [0 => $this->getAttribute($this->getAttribute(($context["this"] ?? null), "entity", []), "getLastLogin", [], "method")], "method"), "html", null, true);
            echo "</span>
    <span class=\"time\">";
            // line 6
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "formatDayTime", [0 => $this->getAttribute($this->getAttribute(($context["this"] ?? null), "entity", []), "getLastLogin", [], "method")], "method"), "html", null, true);
            echo "</span>
";
        } else {
            // line 8
            echo "    <span class=\"date\">";
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["Never"]), "html", null, true);
            echo "</span>
";
        }
    }

    public function getTemplateName()
    {
        return "items_list/model/table/profile/cell.last_login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 8,  37 => 6,  32 => 5,  30 => 4,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "items_list/model/table/profile/cell.last_login.twig", "/var/www/xcart/skins/admin/items_list/model/table/profile/cell.last_login.twig");
    }
}
