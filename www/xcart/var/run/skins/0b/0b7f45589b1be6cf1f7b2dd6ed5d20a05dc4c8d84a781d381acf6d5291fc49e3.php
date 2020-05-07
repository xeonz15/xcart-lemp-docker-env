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

/* profiles/parts/search_form/date_type.registered.twig */
class __TwigTemplate_3276db899532756c20a3edef077498624378479604b7a7e4972c376abaca0a86 extends \XLite\Core\Templating\Twig\Template
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
<li class=\"date-type-r\">
  <input type=\"radio\" name=\"";
        // line 8
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "fieldName", []), "html", null, true);
        echo "\" value=\"R\" id=\"date_type_r\" ";
        if ($this->getAttribute(($context["this"] ?? null), "isDateTypeSelected", [0 => "R"], "method")) {
            echo " checked=\"checked\" ";
        }
        echo " class=\"default\"/>
  <label for=\"date_type_r\">";
        // line 9
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["Registered"]), "html", null, true);
        echo "</label>
</li>
";
    }

    public function getTemplateName()
    {
        return "profiles/parts/search_form/date_type.registered.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 9,  34 => 8,  30 => 6,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "profiles/parts/search_form/date_type.registered.twig", "/var/www/xcart/skins/admin/profiles/parts/search_form/date_type.registered.twig");
    }
}
