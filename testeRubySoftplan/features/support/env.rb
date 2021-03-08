require 'rspec'
require 'capybara'
require 'capybara/cucumber'
require 'faker'
require 'site_prism'

Capybara.register_driver :site_prism do |app|
    Capybara::Selenium::Driver.new(app, browser::chrome)
end

Capybara.configure do |config|
    config.default_driver = :selenium_chrome
end


