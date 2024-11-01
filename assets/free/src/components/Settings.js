import {lazy, React, Suspense} from 'react';
import { Tab, TabList, TabPanel, Tabs } from 'react-tabs';
import Loading from './Loading';

// Directly import all the tab components
import InformationTab from './InformationTab';
import SettingsTab from './SettingsTab';
import NewsletterTab from './NewsletterTab';
import SupportTab from './SupportTab';
import UpgradeTab from './UpgradeTab';
import DonateTab from './DonateTab';


const Settings = () => {
  const tabs = [
    { title: 'Information', content: InformationTab },
    { title: 'Settings', content: SettingsTab },
    { title: 'Newsletter', content: NewsletterTab },
    { title: 'Support', content: SupportTab },
    { title: 'Upgrade', content: UpgradeTab },
    { title: 'Donate', content: DonateTab },
  ];
  return (
    <Tabs>
      <div className="dreamfox-tab-left">
        <div className="dreamfox-tab-left__box">
          <TabList>
            {tabs.map(tab => <Tab key={tab.title}>{tab.title}</Tab>)}
          </TabList>
        </div>
      </div>
      <div className="dreamfox-tab-right">
        <div className="dreamfox-tab-right__box">
          {tabs.map(tab =>
            <TabPanel key={tab.title}>
              <Suspense fallback={<Loading message={'Loading...'} />}>
                <tab.content />
              </Suspense>
            </TabPanel>
          )}
        </div>
      </div>
  </Tabs>
  )
}
export default Settings;