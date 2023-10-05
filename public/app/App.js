
import Sheep from '../javascript/Classes/Sheep.js';
import View_JobSelection from './views/View_JobSelection.js';

import SheepView_StationSelection from './views/sheep_views/SheepView_StationSelection.js';
import SheepView_InitScan from './views/sheep_views/SheepView_InitScan.js';

export default class App {
    #currentView = null;
    #views = {
        jobSelection: new View_JobSelection(this),
        sheepStationSelection: new SheepView_StationSelection(this),
        sheep: {
            stationOne: new SheepView_InitScan(this),
        },
        cow: {
            stationOne: new Sheep([]),
        }
    }

    constructor() {}

    setCurrentView(_viewString) {
        let currentView = this.#views;

        if (_viewString.includes('.')) {
            const viewKeys = _viewString.split('.');

            for (const key of viewKeys) {
                if (currentView[key] === undefined) {
                    throw new Error(`View #${_viewString} does not exist`);
                }
                currentView = currentView[key];
            }
        }
        else {
            if (currentView[_viewString] === undefined) {
                throw new Error(`View #${_viewString} does not exist`);
            }
            currentView = currentView[_viewString];
        }

        this.#currentView = currentView
    }

    async renderView() {
        // Remove rendered views from DOM
        document.querySelector('#single-view').innerHTML = ''
        document.querySelector('#multiple-views').innerHTML = ''

        const view = this.#currentView

        // Check if multiple views
        if (view.length > 1) {
            const tabs = await this.generateTabs(view)

            for (const subView of view) {
                document.querySelector('#multiple-views').appendChild(tabs)
            }
        }
        // Single view
        else {
            // Add view to DOM
            document.querySelector('#single-view').appendChild(await view.html())

            // Set page title
            document.title = view.pageSettings.title
        }

        // Show buttons based on view settings
        if (view.pageSettings.showChangeJobBtn) {
            const btnChangeJob = document.createElement('button')
            btnChangeJob.className = 'btn btn-outline-primary mx-2'
            btnChangeJob.id = 'btn-change-job'
            btnChangeJob.textContent = 'Change job'
            document.querySelector('#view-footer').appendChild(btnChangeJob)

            btnChangeJob.addEventListener('click', () => {
                this.setCurrentView('jobSelection')
                this.renderView()
            })
        }
        if (view.pageSettings.showChangeAccountBtn) {
            const btnChangeAccount = document.createElement('button')
            btnChangeAccount.className = 'btn btn-outline-primary'
            btnChangeAccount.id = 'btn-logout'
            btnChangeAccount.textContent = 'Switch account'
            document.querySelector('#view-footer').appendChild(btnChangeAccount)

            btnChangeAccount.addEventListener('click', () => {
                console.log('logout')
            })
        }
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
        tabContent.className = 'tab-content';
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
            tabButton.textContent = tabData.pageSettings.title;

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
