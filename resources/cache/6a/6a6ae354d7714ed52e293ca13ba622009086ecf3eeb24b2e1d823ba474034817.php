<?php

/* pasteis/index.html */
class __TwigTemplate_97d10500d41e17c44d0fa0253e4b841e91b8e0d9019d816e2ddd1d499934e469 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<h1>Pastéis</h1>
<table border=\"1\">
    <theader>
        <tr>
            <th>Nome</th>
            <th>Recheio</th>
            <th>Valor</th>
        </tr>
    </theader>
    <tbody>
        ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["pasteis"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["pastel"]) {
            // line 12
            echo "        <tr>
            <td>";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["pastel"], "getNome", array(), "method"), "html", null, true);
            echo "</td>
            <td>";
            // line 14
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["pastel"], "getRecheio", array(), "method"), "html", null, true);
            echo "</td>
            <td>";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["pastel"], "getValor", array(), "method"), "html", null, true);
            echo "</td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pastel'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "    </tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "pasteis/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 18,  46 => 15,  42 => 14,  38 => 13,  35 => 12,  31 => 11,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "pasteis/index.html", "/var/www/html/training/pastelaria/resources/views/pasteis/index.html");
    }
}
