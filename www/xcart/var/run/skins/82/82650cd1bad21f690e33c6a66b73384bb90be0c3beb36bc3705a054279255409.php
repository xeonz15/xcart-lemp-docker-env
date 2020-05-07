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

/* items_list/model/table/parts/selector.twig */
class __TwigTemplate_fef6e90168ba0815690f05f266ac69a5616638737e52cea2dca2c39d64c83408 extends \XLite\Core\Templating\Twig\Template
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
<div class=\"selector\">
  ";
        // line 6
        if ($this->getAttribute(($context["this"] ?? null), "isAllowEntitySelect", [0 => $this->getAttribute(($context["this"] ?? null), "entity", [])], "method")) {
            // line 7
            echo "  <input type=\"checkbox\"
         name=\"";
            // line 8
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "getSelectorDataPrefix", [], "method"), "html", null, true);
            echo "[";
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["this"] ?? null), "entity", []), "getUniqueIdentifier", [], "method"), "html", null, true);
            echo "]\"
         value=\"1\"
         class=\"selector not-significant\"
         autocomplete=\"off\"
         ";
            // line 12
            if ($this->getAttribute(($context["this"] ?? null), "isRowSelected", [0 => $this->getAttribute(($context["this"] ?? null), "entity", [])], "method")) {
                echo "checked=\"checked\"";
            }
            // line 13
            echo "  />
  ";
        }
        // line 15
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "items_list/model/table/parts/selector.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 15,  52 => 13,  48 => 12,  39 => 8,  36 => 7,  34 => 6,  30 => 4,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "items_list/model/table/parts/selector.twig", "/var/www/xcart/skins/admin/items_list/model/table/parts/selector.twig");
    }
}
