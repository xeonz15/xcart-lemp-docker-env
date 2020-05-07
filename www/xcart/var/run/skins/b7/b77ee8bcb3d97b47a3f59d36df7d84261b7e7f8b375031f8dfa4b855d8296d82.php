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

/* profiles/parts/search_form/date_type.twig */
class __TwigTemplate_56a11f72ee7ae7917185aec2c36f4060ece4d6c30fc7ac67b38914dd4fc82aa6 extends \XLite\Core\Templating\Twig\Template
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
<div class=\"table-label date-condition-label\">
  <label>";
        // line 6
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["User activity"]), "html", null, true);
        echo ":</label>
</div>
<div class=\"star\">&nbsp;</div>
<div class=\"table-value date-condition-value\">
  <ul class=\"clearfix\">
    ";
        // line 11
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget_list')->getCallable(), [$this->env, $context, [0 => "profiles.search.dateTypes"]]), "html", null, true);
        echo "
  </ul>

  <input type=\"hidden\" name=\"date_period\" value=\"C\" />

  ";
        // line 16
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget')->getCallable(), [$this->env, $context, [0 => "\\XLite\\View\\FormField\\Input\\Text\\DateRange", "fieldName" => "dateRange", "value" => $this->getAttribute(($context["this"] ?? null), "getCondition", [0 => "dateRange"], "method"), "fieldOnly" => "true"]]), "html", null, true);
        echo "
</div>

";
    }

    public function getTemplateName()
    {
        return "profiles/parts/search_form/date_type.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 16,  42 => 11,  34 => 6,  30 => 4,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "profiles/parts/search_form/date_type.twig", "/var/www/xcart/skins/admin/profiles/parts/search_form/date_type.twig");
    }
}
