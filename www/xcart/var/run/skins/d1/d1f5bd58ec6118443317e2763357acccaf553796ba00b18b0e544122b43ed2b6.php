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

/* form_model/sticky_panel/body.twig */
class __TwigTemplate_2573057e3e79ae368586a54bac2de5c55ae608f432f2e2ad23646bd593ddd24e extends \XLite\Core\Templating\Twig\Template
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
        // line 1
        echo "<xlite-sticky-panel inline-template :changed=\"isChanged()\" :form-state=\"\$form\">
    <div class=\"";
        // line 2
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "getClass", [], "method"), "html", null, true);
        echo "\">
        <div class=\"box\">
            ";
        $fullPath = \XLite\Core\Layout::getInstance()->getResourceFullPath($this->getAttribute(        // line 4
($context["this"] ?? null), "getBody", [], "method"));        list($templateWrapperText, $templateWrapperStart) = $this->getThis()->startMarker($fullPath);
        if ($templateWrapperText) {
echo $templateWrapperStart;
}

        $this->loadTemplate($this->getAttribute(($context["this"] ?? null), "getBody", [], "method"), "form_model/sticky_panel/body.twig", 4)->display($context);
        if ($templateWrapperText) {
            echo $this->getThis()->endMarker($fullPath, $templateWrapperText);
        }
        // line 5
        echo "        </div>
    </div>
</xlite-sticky-panel>";
    }

    public function getTemplateName()
    {
        return "form_model/sticky_panel/body.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 5,  38 => 4,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "form_model/sticky_panel/body.twig", "/var/www/xcart/skins/admin/form_model/sticky_panel/body.twig");
    }
}
