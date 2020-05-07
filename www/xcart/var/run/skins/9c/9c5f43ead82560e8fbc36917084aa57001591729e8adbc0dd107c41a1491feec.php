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

/* /home/vagrant/next/output/xcart/src/skins/customer/modules/XC/NewsletterSubscriptions/form/parts/form.twig */
class __TwigTemplate_ab42000a36f639c7b3d38448e5458873d0ba03903a1929600d14bcfeeed929bd extends \XLite\Core\Templating\Twig\Template
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
";
        // line 7
        $this->startForm("XLite\\Module\\XC\\NewsletterSubscriptions\\View\\Form\\Subscription", ["formTarget" => "newsletter_subscriptions", "formAction" => "subscribe"]);        // line 8
        echo "    <div class=\"subscription-form-label\">
        ";
        // line 9
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "getFormLabel", [], "method"), "html", null, true);
        echo "
    </div>
    <div class=\"subscription-form-fields\">
      ";
        // line 12
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget')->getCallable(), [$this->env, $context, [0 => "XLite\\View\\FormField\\Input\\Text\\Email", "fieldName" => "newlettersubscription_email", "required" => "true", "placeholder" => call_user_func_array($this->env->getFunction('t')->getCallable(), ["Enter email address", [], null, "placeholder"]), "maxlength" => "255", "fieldOnly" => $this->getAttribute(($context["this"] ?? null), "isFieldOnly", [], "method"), "label" => call_user_func_array($this->env->getFunction('t')->getCallable(), ["Email"])]]), "html", null, true);
        echo "
      ";
        // line 13
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget')->getCallable(), [$this->env, $context, [0 => "\\XLite\\View\\Button\\Submit", "label" => call_user_func_array($this->env->getFunction('t')->getCallable(), ["Subscribe"])]]), "html", null, true);
        echo "
    </div>
";
        $this->endForm();    }

    public function getTemplateName()
    {
        return "/home/vagrant/next/output/xcart/src/skins/customer/modules/XC/NewsletterSubscriptions/form/parts/form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 13,  43 => 12,  37 => 9,  34 => 8,  33 => 7,  30 => 6,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "/home/vagrant/next/output/xcart/src/skins/customer/modules/XC/NewsletterSubscriptions/form/parts/form.twig", "");
    }
}
