
export default class SheepView {
    views = []
    viewSettings = {}

    constructor(_views) {
        this.views = _views
        this.viewSettings = _views[0].viewSettings
    }

    async html() {
        const parent = document.createElement('div')

        const header = document.createElement('div')
        header.id = 'view-header'
        header.innerHTML = `
            <div class="row d-flex justify-content-center pt-3">
                <div class="col-12 text-center">
                    <div class="col-sm-12 text-center logo-img">
                        <img src="../assets/images/icons/sheep.png" width="100" alt="">
                    </div>
                    <p class="text-muted">Sheeps</p>
                    <div id="view-buttons"></div>
                </div>
            </div>
            <hr />
        `
        parent.appendChild(header)

        if (this.views.length > 1) {
            parent.appendChild(await this.generateTabs(this.views))
        }
        else {
            parent.appendChild(await this.views[0].html())
        }

        // Set view settings from the first view
        this.viewSettings.title = this.views[0].viewSettings.title

        return parent
    }

    async generateTabs(_viewsData) {
        const tabWrapper = document.createElement('div');
        tabWrapper.className = 'page-wrapper';

        // Create the navigation bar
        const nav = document.createElement('nav');
        const navTabs = document.createElement('div');
        navTabs.className = 'nav nav-tabs';
        navTabs.id = 'nav-tab';
        nav.appendChild(navTabs);

        // Create the tab content container
        const tabContent = document.createElement('div');
        tabContent.className = 'tab-content mt-3';
        tabContent.id = 'nav-tabContent';

        // Create individual tabs and content panes
        for (let i = 0; i < _viewsData.length; i++) {
            const tabData = _viewsData[i];
            const tabId = `nav-${i}`;
            const tabPane = document.createElement('div');
            const tabButton = document.createElement('button');

            tabPane.className = 'tab-pane fade';
            tabPane.id = tabId;
            tabPane.setAttribute('role', 'tabpanel');
            tabPane.setAttribute('aria-labelledby', `nav-${i}-tab`);
            tabPane.appendChild(await tabData.html());

            tabButton.className = 'nav-link';
            tabButton.dataset.bsToggle = 'tab';
            tabButton.dataset.bsTarget = `#${tabId}`;
            tabButton.setAttribute('type', 'button');
            tabButton.setAttribute('role', 'tab');
            tabButton.setAttribute('aria-controls', tabId);
            tabButton.setAttribute('aria-selected', i === 0 ? 'true' : 'false');
            tabButton.textContent = tabData.viewSettings.title;

            navTabs.appendChild(tabButton);
            tabContent.appendChild(tabPane);
        }

        // Make the first tab active
        navTabs.firstChild.classList.add('active');
        tabContent.firstChild.classList.add('show', 'active');

        // Append everything to the wrapper
        tabWrapper.appendChild(nav);
        tabWrapper.appendChild(tabContent);

        return tabWrapper;
    }
}
