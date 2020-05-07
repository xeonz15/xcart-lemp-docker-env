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

/* /home/vagrant/next/output/xcart/src/skins/mail/common/failed_transaction/parts/transaction_url.twig */
class __TwigTemplate_54bbb88442f23f0fb6667a4ad1dbd87e15c197ea77553dcf94430a3d0e46ecc7 extends \XLite\Core\Templating\Twig\Template
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
<p>
  ";
        // line 8
        echo call_user_func_array($this->env->getFunction('t')->getCallable(), ["You can find the failed transaction here", ["url" => $this->getAttribute(($context["this"] ?? null), "transactionSearchURL", [])]]);
        echo "
<p>";
    }

    public function getTemplateName()
    {
        return "/home/vagrant/next/output/xcart/src/skins/mail/common/failed_transaction/parts/transaction_url.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 8,  30 => 6,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "/home/vagrant/next/output/xcart/src/skins/mail/common/failed_transaction/parts/transaction_url.twig", "");
    }
}
