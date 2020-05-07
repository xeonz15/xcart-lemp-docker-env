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

/* common/tabs.twig */
class __TwigTemplate_8c60916b60dc8b9355017a115b28c381d733b18c45b6e1cbe0851e13dcef5746 extends \XLite\Core\Templating\Twig\Template
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
        if ($this->getAttribute(($context["this"] ?? null), "getTitle", [], "method")) {
            // line 6
            echo "  <h1>";
            echo $this->getAttribute(($context["this"] ?? null), "title", []);
            echo "</h1>
";
        }
        // line 8
        echo "
<div class=\"tabbed-content-wrapper\">
  <div class=\"tabs-container\">
    ";
        // line 11
        if ($this->getAttribute(($context["this"] ?? null), "isTabsNavigationVisible", [], "method")) {
            // line 12
            echo "      <div class=\"page-tabs\">
  
        <ul>
          ";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["this"] ?? null), "getTabs", [], "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["tabPage"]) {
                // line 16
                echo "            <li class=\"tab";
                if ($this->getAttribute($context["tabPage"], "selected", [])) {
                    echo "-current";
                }
                echo "\">
              <a href=\"";
                // line 17
                echo $this->getAttribute($context["tabPage"], "url", []);
                echo "\">";
                echo $this->getAttribute($context["tabPage"], "title", []);
                echo "</a>
            </li>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tabPage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo "          ";
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget_list')->getCallable(), [$this->env, $context, [0 => "tabs.items"]]), "html", null, true);
            echo "
        </ul>
        ";
            // line 22
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget_list')->getCallable(), [$this->env, $context, [0 => "tabs.after.items"]]), "html", null, true);
            echo "
      </div>
    ";
        }
        // line 25
        echo "    <div class=\"tab-content\">
      ";
        // line 26
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget_list')->getCallable(), [$this->env, $context, [0 => "tabs.content"]]), "html", null, true);
        echo "
      ";
        // line 27
        if ($this->getAttribute(($context["this"] ?? null), "isTemplateOnlyTab", [], "method")) {
            // line 28
            echo "        ";
            $fullPath = \XLite\Core\Layout::getInstance()->getResourceFullPath($this->getAttribute(($context["this"] ?? null), "getTabTemplate", [], "method"));            list($templateWrapperText, $templateWrapperStart) = $this->getThis()->startMarker($fullPath);
            if ($templateWrapperText) {
echo $templateWrapperStart;
}

            $this->loadTemplate($this->getAttribute(($context["this"] ?? null), "getTabTemplate", [], "method"), "common/tabs.twig", 28)->display($context);
            if ($templateWrapperText) {
                echo $this->getThis()->endMarker($fullPath, $templateWrapperText);
            }
            // line 29
            echo "      ";
        }
        // line 30
        echo "      ";
        if ($this->getAttribute(($context["this"] ?? null), "isWidgetOnlyTab", [], "method")) {
            // line 31
            echo "        ";
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget')->getCallable(), [$this->env, $context, [0 => $this->getAttribute(($context["this"] ?? null), "getTabWidget", [], "method")]]), "html", null, true);
            echo "
      ";
        }
        // line 33
        echo "      ";
        if ($this->getAttribute(($context["this"] ?? null), "isFullWidgetTab", [], "method")) {
            // line 34
            echo "        ";
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget')->getCallable(), [$this->env, $context, [0 => $this->getAttribute(($context["this"] ?? null), "getTabWidget", [], "method"), "template" => $this->getAttribute(($context["this"] ?? null), "getTabTemplate", [], "method")]]), "html", null, true);
            echo "
      ";
        }
        // line 36
        echo "      ";
        if ($this->getAttribute(($context["this"] ?? null), "isCommonTab", [], "method")) {
            // line 37
            echo "        ";
            $fullPath = \XLite\Core\Layout::getInstance()->getResourceFullPath($this->getAttribute(($context["this"] ?? null), "getPageTemplate", [], "method"));            list($templateWrapperText, $templateWrapperStart) = $this->getThis()->startMarker($fullPath);
            if ($templateWrapperText) {
echo $templateWrapperStart;
}

            $this->loadTemplate($this->getAttribute(($context["this"] ?? null), "getPageTemplate", [], "method"), "common/tabs.twig", 37)->display($context);
            if ($templateWrapperText) {
                echo $this->getThis()->endMarker($fullPath, $templateWrapperText);
            }
            // line 38
            echo "      ";
        }
        // line 39
        echo "    </div>

  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "common/tabs.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 39,  142 => 38,  131 => 37,  128 => 36,  122 => 34,  119 => 33,  113 => 31,  110 => 30,  107 => 29,  96 => 28,  94 => 27,  90 => 26,  87 => 25,  81 => 22,  75 => 20,  64 => 17,  57 => 16,  53 => 15,  48 => 12,  46 => 11,  41 => 8,  35 => 6,  33 => 5,  30 => 4,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "common/tabs.twig", "/var/www/xcart/skins/admin/common/tabs.twig");
    }
}
