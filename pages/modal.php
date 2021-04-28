<div class="modal modal_lenovo-site fade" id="modal-user-form" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content modal_site bg_white {% block modal_content_class %}{% endblock %}">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3 class="modal-title bdb--silver p_b5 m_b15"></h3>
            <div class="modal-body {% block body_class %}{% endblock %}">

                <div class="user-form-content"><div class="ajax-content">
                    </div></div>
            </div>
            <div class="modal-footer {% block footer_class %}{% endblock %}">

                    <a href="#" class="btn btn-default" data-dismiss="modal"
                       aria-hidden="true">{{ 'btn.close'|trans }}</a>

            </div>

        </div>
    </div>
</div>