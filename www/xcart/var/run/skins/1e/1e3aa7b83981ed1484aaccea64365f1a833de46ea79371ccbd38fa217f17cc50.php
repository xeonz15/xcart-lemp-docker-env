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

/* modules/XC/ThemeTweaker/themetweaker_panel/panel.twig */
class __TwigTemplate_f20c9d0b3f0b583ffe84ac01bad76781983917d13c65bdb2ad1877fd5897e116 extends \XLite\Core\Templating\Twig\Template
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
<div id=\"themetweaker-panel-loader-point\">
  <xlite-themetweaker-panel inline-template mode=\"";
        // line 6
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "getThemeTweakerMode", [], "method"), "html", null, true);
        echo "\">
    <div class=\"themetweaker-panel-wrapper themetweaker-panel--initial ";
        // line 7
        echo (($this->getAttribute(($context["this"] ?? null), "getThemeTweakerMode", [], "method")) ? ("state-on") : ("state-off"));
        echo "\">
      <div id=\"themetweaker-panel\" class=\"themetweaker-panel\">
        <div class=\"themetweaker-panel--inner\" :class=\"panelClasses\">
          <div class=\"themetweaker-panel--header\">
            ";
        // line 11
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget_list')->getCallable(), [$this->env, $context, [0 => "themetweaker-panel--header"]]), "html", null, true);
        echo "
          </div>
          <div class=\"themetweaker-panel--body\" v-show=\"mode && isExpanded\" transition=\"expand\">
            ";
        // line 14
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget_list')->getCallable(), [$this->env, $context, [0 => "themetweaker-panel--body"]]), "html", null, true);
        echo "
          </div>
        </div>
      </div>
      ";
        // line 18
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget_list')->getCallable(), [$this->env, $context, [0 => "themetweaker-panel-extensions"]]), "html", null, true);
        echo "
    </div>
  </xlite-themetweaker-panel>
</div>";
    }

    public function getTemplateName()
    {
        return "modules/XC/ThemeTweaker/themetweaker_panel/panel.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 18,  51 => 14,  45 => 11,  38 => 7,  34 => 6,  30 => 4,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "modules/XC/ThemeTweaker/themetweaker_panel/panel.twig", "/var/www/xcart/skins/customer/modules/XC/ThemeTweaker/themetweaker_panel/panel.twig");
    }
}
