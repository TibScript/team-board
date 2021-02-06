---
docs_list_title: Team board project
docs:

- title: Conception

- title: Product Vision
  url: product/product-vision.html

- title: Needs
  url: product/need.html

- title: Features (wip)
  url: product/features.html

- title: Release
  url: product/release.html

- title: Architecture

- title: Target Paltform
  url: architecture/target_platform.html

---
## Team board project
<ul>
{% for item in page.docs %}
  {% if item.url %}
    <li><a href="{{ item.url }}">{{ item.title }}</a></li>
  {% else %}
    <h3>{{ item.title }}</h3>
  {% endif %}
{% endfor %}
</ul>
