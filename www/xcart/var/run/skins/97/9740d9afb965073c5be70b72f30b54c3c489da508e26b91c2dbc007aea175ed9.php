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

/* search_panel/body.twig */
class __TwigTemplate_65bbed5e1e5fb84baf8f785f946564c8abdd412d6c441487eeae5b084b075716 extends \XLite\Core\Templating\Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'search_conditions_line' => [$this, 'block_search_conditions_line'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 4
        echo "
";
        // line 5
        if ($this->getAttribute(($context["this"] ?? null), "isUseFilter", [], "method")) {
            // line 6
            echo "  ";
            $fullPath = \XLite\Core\Layout::getInstance()->getResourceFullPath("search_panel/filters.twig");            list($templateWrapperText, $templateWrapperStart) = $this->getThis()->startMarker($fullPath);
            if ($templateWrapperText) {
echo $templateWrapperStart;
}

            $this->loadTemplate("search_panel/filters.twig", "search_panel/body.twig", 6)->display($context);
            if ($templateWrapperText) {
                echo $this->getThis()->endMarker($fullPath, $templateWrapperText);
            }
        }
        // line 8
        echo "
<div class=\"title-margin\"></div>
";
        // line 10
        $this->startForm($this->getAttribute($this->getAttribute(($context["this"] ?? null), "formOptions", []), "class", []), ["formTarget" => $this->getAttribute($this->getAttribute(($context["this"] ?? null), "formOptions", []), "target", []), "formAction" => $this->getAttribute($this->getAttribute(($context["this"] ?? null), "formOptions", []), "action", []), "formParams" => $this->getAttribute($this->getAttribute(($context["this"] ?? null), "formOptions", []), "params", []), "className" => $this->getAttribute(($context["this"] ?? null), "getContainerClass", [], "method"), "itemsList" => $this->getAttribute(($context["this"] ?? null), "getItemsList", [], "method")]);        // line 11
        echo "
  ";
        // line 12
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget_list')->getCallable(), [$this->env, $context, [0 => "before", "type" => "nested"]]), "html", null, true);
        echo "

  <div class=\"search-conditions-box\">

    ";
        // line 16
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "displayCommentedData", [0 => $this->getAttribute(($context["this"] ?? null), "getSearchPanelParams", [], "method")], "method"), "html", null, true);
        echo "

    <div class=\"search-conditions\">
      ";
        // line 19
        $this->displayBlock('search_conditions_line', $context, $blocks);
        // line 32
        echo "    </div>

    ";
        // line 34
        if ($this->getAttribute(($context["this"] ?? null), "getHiddenConditions", [], "method")) {
            // line 35
            echo "      <div class=\"search-conditions-hr\">
      </div>
    ";
        }
        // line 38
        echo "
    ";
        // line 39
        if ($this->getAttribute(($context["this"] ?? null), "getHiddenConditions", [], "method")) {
            // line 40
            echo "      <div class=\"search-conditions-hidden\">
        ";
            // line 41
            $context["count"] = twig_length_filter($this->env, $this->getAttribute(($context["this"] ?? null), "getHiddenConditions", [], "method"));
            // line 42
            echo "
        ";
            // line 43
            if ($this->getAttribute($this->getAttribute(($context["this"] ?? null), "widgetParams", []), "changeHiddenConditionsCount", [])) {
                // line 44
                echo "          ";
                $context["count"] = (($context["count"] ?? null) + 1);
                // line 45
                echo "        ";
            }
            // line 46
            echo "
        ";
            // line 47
            if (((($context["count"] ?? null) % 2) > 0)) {
                // line 48
                echo "          ";
                $context["firstColumnLength"] = ((($context["count"] ?? null) / 2) + 1);
                // line 49
                echo "        ";
            } else {
                // line 50
                echo "          ";
                $context["firstColumnLength"] = (($context["count"] ?? null) / 2);
                // line 51
                echo "        ";
            }
            // line 52
            echo "
        <div class=\"left-column\">
          <ul class=\"table\">
            ";
            // line 55
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getAttribute(($context["this"] ?? null), "getHiddenConditions", [], "method"), 0, ($context["firstColumnLength"] ?? null)));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["name"] => $context["conditionWidget"]) {
                // line 56
                echo "              <li class=\"";
                echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "-condition ";
                echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "getRowClass", [0 => $this->getAttribute($context["loop"], "index", []), 1 => "odd", 2 => "even"], "method"), "html", null, true);
                echo "\">";
                echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute($context["conditionWidget"], "display", [], "method"), "html", null, true);
                echo "</li>
            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['conditionWidget'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            echo "          </ul>
        </div>

        <div class=\"right-column\">
          <ul class=\"table\">
            ";
            // line 63
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getAttribute(($context["this"] ?? null), "getHiddenConditions", [], "method"), ($context["firstColumnLength"] ?? null), ($context["count"] ?? null)));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["name"] => $context["conditionWidget"]) {
                // line 64
                echo "              <li class=\"";
                echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "-condition ";
                echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "getRowClass", [0 => $this->getAttribute($context["loop"], "index", []), 1 => "odd", 2 => "even"], "method"), "html", null, true);
                echo "\">";
                echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute($context["conditionWidget"], "display", [], "method"), "html", null, true);
                echo "</li>
            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['conditionWidget'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 66
            echo "
            ";
            // line 67
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget_list')->getCallable(), [$this->env, $context, [0 => "hiddenConditions", "type" => "nested"]]), "html", null, true);
            echo "
          </ul>
        </div>
      </div>
    ";
        }
        // line 72
        echo "
    ";
        // line 73
        if ($this->getAttribute(($context["this"] ?? null), "getHiddenConditions", [], "method")) {
            // line 74
            echo "      <div class=\"arrow\"><span class=\"fa fa-angle-down\"></span></div>
    ";
        }
        // line 76
        echo "
    <div class=\"actions-bottom\">
      ";
        // line 78
        if (($this->getAttribute(($context["this"] ?? null), "isUseFilter", [], "method") && $this->getAttribute(($context["this"] ?? null), "canSaveFilter", [], "method"))) {
            // line 79
            echo "        ";
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget')->getCallable(), [$this->env, $context, [0 => "\\XLite\\View\\Button\\SaveSearchFilter"]]), "html", null, true);
            echo "
      ";
        }
        // line 81
        echo "      ";
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget_list')->getCallable(), [$this->env, $context, [0 => "actions", "type" => "nested"]]), "html", null, true);
        echo "
    </div>

  </div>

  ";
        // line 86
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget_list')->getCallable(), [$this->env, $context, [0 => "after", "type" => "nested"]]), "html", null, true);
        echo "

";
        $this->endForm();    }

    // line 19
    public function block_search_conditions_line($context, array $blocks = [])
    {
        // line 20
        echo "        <ul class=\"inline-table\">
          ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["this"] ?? null), "getConditions", [], "method"));
        foreach ($context['_seq'] as $context["name"] => $context["conditionWidget"]) {
            // line 22
            echo "            <li class=\"";
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $context["name"], "html", null, true);
            echo "-condition\">";
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute($context["conditionWidget"], "display", [], "method"), "html", null, true);
            echo "</li>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['conditionWidget'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "          <li class=\"actions\">
            ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["this"] ?? null), "getActions", [], "method"));
        foreach ($context['_seq'] as $context["name"] => $context["action"]) {
            // line 26
            echo "              ";
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute($context["action"], "display", [], "method"), "html", null, true);
            echo "
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['action'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "          </li>
          ";
        // line 29
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget_list')->getCallable(), [$this->env, $context, [0 => "conditions", "type" => "nested"]]), "html", null, true);
        echo "
        </ul>
      ";
    }

    public function getTemplateName()
    {
        return "search_panel/body.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  296 => 29,  293 => 28,  284 => 26,  280 => 25,  277 => 24,  266 => 22,  262 => 21,  259 => 20,  256 => 19,  249 => 86,  240 => 81,  234 => 79,  232 => 78,  228 => 76,  224 => 74,  222 => 73,  219 => 72,  211 => 67,  208 => 66,  187 => 64,  170 => 63,  163 => 58,  142 => 56,  125 => 55,  120 => 52,  117 => 51,  114 => 50,  111 => 49,  108 => 48,  106 => 47,  103 => 46,  100 => 45,  97 => 44,  95 => 43,  92 => 42,  90 => 41,  87 => 40,  85 => 39,  82 => 38,  77 => 35,  75 => 34,  71 => 32,  69 => 19,  63 => 16,  56 => 12,  53 => 11,  52 => 10,  48 => 8,  36 => 6,  34 => 5,  31 => 4,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "search_panel/body.twig", "/var/www/xcart/skins/admin/search_panel/body.twig");
    }
}
